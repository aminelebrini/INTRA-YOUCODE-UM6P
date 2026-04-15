<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UpdateUserService;

class UpdateUserController extends Controller
{
    private $UpdateUserService;
    public function __construct(UpdateUserService $UpdateUserService)
    {
        $this->UpdateUserService = $UpdateUserService;
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|in:admin,formateur,etudiant',
            'campus' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'link_profile' => 'nullable|url|max:255',
            'etat' => 'nullable|string|max:255'
        ]);
        
        $update = $this->UpdateUserService->update($request->id, $request->fullname, $request->email, $request->role, $request->campus, $request->ville, $request->link_profile, $request->etat);
        if($update)
        {            
            return response()->json(['message' => 'User updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update user'], 500);   
        }
    }
    public function SendLien(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'nom' => 'required|string|max:255',
            'lien' => 'required|url|max:255'
        ]);
        
        $update = $this->UpdateUserService->SendLien($request->user_id, $request->nom, $request->lien);
        if($update)
        {            
            return response()->json(['message' => 'Lien sent successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to send lien'], 500);   
        }
    }
}
