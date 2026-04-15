<?php
namespace App\Http\Repository;
use App\Models\User;
use App\Models\Lien;

class UpdateUserRepository
{
    public function updateUser($id, $fullname, $email, $role, $campus, $ville, $link_profile, $etat)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }
        $user->fullname = $fullname;
        $user->email = $email;
        $user->role = $role;
        $user->campus = $campus;
        $user->ville = $ville;
        $user->link_profile = $link_profile;
        $user->etat = $etat;
        $user->save();
        return $user;
    }
    public function SendLien($UserId, $nom, $url)
    {
        $Lien = Lien::create([
            'user_id' => $UserId,
            'nom' => $nom,
            'lien' => $url
        ]);
        return $Lien;
    }
}

?>