<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CreateClasseService;

class CreateClasseController extends Controller
{
    private $CreateClasseService;

    public function __construct(CreateClasseService $CreateClasseService)
    {
        $this->CreateClasseService = $CreateClasseService;
    }

    public function create(Request $request)
    {
        $request->validate([
            'classename' => 'required|string|max:255',
            'classecapacity' => 'required|integer',
            'promo' => 'required|string',
            'link_logo' => 'required|url',
            'campus' => 'required|string',
        ]);

        $classe = $this->CreateClasseService->create(
            $request->classename,
            $request->classecapacity,
            $request->promo,
            $request->link_logo,
            $request->campus
        );

        if ($classe) {
            return response()->json(['message' => 'Class created successfully', 'class' => $classe], 201);
        } else {
            return response()->json(['message' => 'Failed to create class'], 500);
        }
    }
}
