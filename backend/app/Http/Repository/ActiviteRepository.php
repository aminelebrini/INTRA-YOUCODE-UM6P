<?php

namespace App\Http\Repository;

use App\Models\Activite;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ActiviteRepository
{
    public function createActivite($nom, $description, $type, $classe_id, $ressource, $etat, $date_debut, $date_fin)
{
        $students = Student::all();
    
        if($students->count() > 1)
        {
            foreach($students as $student)
            {
                $activite = Activite::create([
                    'nom' => $nom,
                    'description' => $description,
                    'type' => $type,
                    'user_id' => $student->user_id,
                    'classe_id' => $classe_id,
                    'ressource' => $ressource,
                    'etat' => $etat,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin
                ]);

                $repoName = "brief-" . $activite->id . "-" . str_replace(' ', '-', strtolower($nom));
    
                $repoResponse = Http::withToken(env('GITHUB_TOKEN'))
                ->post("https://api.github.com/user/repos", [
                    'name' => $repoName,
                    'private' => true,
                    'auto_init' => true 
                ]);

                if (!$repoResponse->successful()) {
                    return response()->json(['error' => 'Impossible de créer le repo principal', 'details' => $repoResponse->json()], 400);
                }
                $studentName = str_replace(' ', '-', strtolower($student->fullname ?? 'student-'.$student->id));
        
                $fileResponse = Http::withToken(env('GITHUB_TOKEN'))
                    ->put("https://api.github.com/repos/" . env('GITHUB_USER') . "/$repoName/contents/$studentName/README.md", [
                        'message' => "Initialisation du dossier pour $studentName",
                        'content' => base64_encode("# Dossier de " . $studentName . "\nDéposez votre travail ici. YouCode INTRA")
                    ]);
            }
    

            return response()->json([
                'message' => 'Repo principal créé avec les dossiers étudiants',
                'repo_url' => $repoResponse->json()['html_url'],
            ], 201);
        }
    }
}