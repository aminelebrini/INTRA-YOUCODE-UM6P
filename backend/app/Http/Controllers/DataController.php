<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DataService;

class DataController extends Controller
{
    private $DataService;

    public function __construct(DataService $DataService)
    {
        $this->DataService = $DataService;
    }

    public function data()
    {
        try{
            $users = $this->DataService->getUsers();
            return response()->json(['users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve users',
             'error' => $e->getMessage()], 500);    
        }
    }
}
