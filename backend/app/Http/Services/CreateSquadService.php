<?php

namespace App\Http\Services;

use App\Http\Repository\CreateSquadRepository;

class CreateSquadService
{
	private $createSquadRepository;

	public function __construct(CreateSquadRepository $createSquadRepository)
	{
		$this->createSquadRepository = $createSquadRepository;
	}

	public function create($nom, $classeId, array $allowedUserIds)
	{
		return $this->createSquadRepository->createSquad($nom, $classeId, $allowedUserIds);
	}
}

