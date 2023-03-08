<?php

namespace App\Services;

use App\Models\DateTime;

class DateTimeServices
{
    public function getAllDateTime()
    {
        return DateTime::all();
    }

    public function callDateTimeApi()
    {
        try {
            $dateTime = ''; //call dateTime API nodeJs
            self::saveDateTime($dateTime);
            return $dateTime;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveDateTime($dateTime)
    {
        $flight = DateTime::create($dateTime);
    }
}
