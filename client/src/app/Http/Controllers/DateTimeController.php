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
            throw $th;
        }
    }

    public function callDateTimeService()
    {
        $dateTime = $this->dateTimeService->callDateTimeApi();
        return response()->json($dateTime);
    }
}
