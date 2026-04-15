<?php
namespace App\Http\Services;
use App\Http\Repository\UpdateUserRepository;


class UpdateUserService
{
    private $UpdateUserRepository;
    public function __construct(UpdateUserRepository $UpdateUserRepository)
    {
        $this->UpdateUserRepository = $UpdateUserRepository;
    }
    public function update($id, $fullname, $email, $role, $campus, $ville, $link_profile, $etat)
    {
        return $this->UpdateUserRepository->updateUser($id, $fullname, $email, $role, $campus, $ville, $link_profile, $etat);
    }
    public function SendLien($UserId, $nom, $url)
    {
        return $this->UpdateUserRepository->SendLien($UserId, $nom, $url);
    }
}
