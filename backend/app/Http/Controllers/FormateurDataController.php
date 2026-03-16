<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FormateurDataService;

class FormateurDataController extends Controller
{
    private $FormateurDataService;

    public function __construct(FormateurDataService $FormateurDataService)
    {
        $this->FormateurDataService = $FormateurDataService;
    }
    public function Data()
    {
        $formateurData = $this->FormateurDataService->getFormateurData();

        return response()->json(['formateurData' => $formateurData], 200);
    }
}
