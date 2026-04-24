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
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'promo' => 'required|string',
            'link_logo' => 'required|url',
            'campus' => 'required|string',
        ]);

        $classe = $this->CreateClasseService->create(
            $request->nom,
            $request->capacite,
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

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:classes,id',
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'promo' => 'required|string',
            'link_logo' => 'required|url',
            'campus' => 'required|string',
        ]);

        $classe = $this->CreateClasseService->update(
            $request->id,
            $request->nom,
            $request->capacite,
            $request->promo,
            $request->link_logo,
            $request->campus
        );

        if ($classe) {
            return response()->json(['message' => 'Class updated successfully', 'class' => $classe], 200);
        }

        return response()->json(['message' => 'Failed to update class'], 500);
    }
}
