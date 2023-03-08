<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DateTimeServices;

class DateTimeController extends Controller
{
    public $dateTimeService;

    public function __construct(DateTimeServices $dateTimeService)
    {
        $this->dateTimeService = $dateTimeService;
    }

    public function getAllRecord()
    {
        $allDateTime = $this->dateTimeService->getAllDateTime();
        return response()->json($allDateTime);
    }

    public function callDateTimeService()
    {
        $dateTime = $this->dateTimeService->callDateTimeApi();
        return response()->json($dateTime);
    }
}
