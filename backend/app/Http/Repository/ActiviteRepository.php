<?php

namespace App\Http\Repository;
use App\Models\Activite;
use App\Models\Student;
use Illuminate\Support\Facades\Http;

class ActiviteRepository
{
    public function createActivite($nom,
        $description,
        $type,
        $binome_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin)
    {
        $activite = Activite::create([
            'nom' => $nom,
            'description' => $description,
            'type' => $type,
            'binome_id' => $binome_id,
            'ressource' => $ressource,
            'etat' => $etat,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin
        ]);

        $students = Student::with('users')->get();

        foreach($students as $student)
        {
            $repository = "brief-".$activite->id."-student". "-" . str_replace(' ', '-', strtolower($student->users->fullname));
            $response = Http::withToken(env('GITHUB_TOKEN'))
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post("https://api.github.com/repos". env('GITHUB_ORG') . "/" . env('GITHUB_TEMPLATE') . "/generate", [
                'owner' => env('GITHUB_ORG'),
                'name' => $repository,
                'description' => "Repo pour : " . $activite->description,
                'private' => true,
            ]);

            if($response->successful())
            {
                return response()->json(['message' => 'Activité créée avec succès', 'activite' => $activite,
                'lien' => $response->json()['html_url']], 201);
                
            }
        }
    }
    
}
?>