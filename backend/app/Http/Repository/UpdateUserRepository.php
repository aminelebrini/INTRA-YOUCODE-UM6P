<?php
namespace App\Http\Repository;
use App\Models\User;

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
}

?>