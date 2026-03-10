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

    public function index()
    {
        try{
            $students = $this->DataService->getStudents();
            return response()->json($students, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve students',
             'error' => $e->getMessage()], 500);    
        }
    }
}
