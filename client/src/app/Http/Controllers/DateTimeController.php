<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DateTimeService;

class DateTimeController extends Controller
{
    public $dateTimeService;

    public function __construct(DateTimeService $dateTimeService)
    {
        $this->dateTimeService = $dateTimeService;
    }

    public function getAllRecord()
    {
        try {
            $allDateTime = $this->dateTimeService->getAllDateTime();
            return response()->json($allDateTime);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function callDateTimeService(Request $request, $area, $location)
    {
        $dateTime = $this->dateTimeService->callDateTimeApi($area, $location);
        return response()->json($dateTime);
    }
}
