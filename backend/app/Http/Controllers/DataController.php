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
            $classes = $this->DataService->getClasses();
            $assignformateurs = $this->DataService->getFormateurs();
            $assignclasses = $this->DataService->getNotAssignedClasses();
            $formateurData = $this->DataService->getFormateurData();
            $absences = $this->DataService->getAbsences();
            $announcements = $this->DataService->getAnnouncements();

            return response()->json(['users' => $users, 
            'classes' => $classes, 
            'assignformateurs' => $assignformateurs, 
            'assignclasses' => $assignclasses, 
            'formateurData' => $formateurData,
            'absences' => $absences,
            'announcements' => $announcements]
            , 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve users',
             'error' => $e->getMessage()], 500);    
        }
    }
    public function allData()
    {
        $allData = $this->DataService->getAllData();
        return response()->json($allData, 200);
    }
}
