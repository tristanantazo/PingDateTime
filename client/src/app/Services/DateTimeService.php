<?php

namespace App\Services;

use App\Models\DateTime;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class DateTimeService
{
    public function getAllDateTime()
    {
        return DateTime::orderBy('id', 'DESC')->get();
    }

    public function callDateTimeApi($area, $location)
    {
        try {
            $response = Http::accept('application/json')->get('http://worldtimeapi.org/api/timezone/' . $area . '/' . $location);
            $data['header'] = $response->headers();
            $data['status'] = $response->status();
            $data['body'] = $response->json();
            return self::saveDateTime($data);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveDateTime($data)
    {
        try {
            $d = new DateTime;
            $d->body = $data['body']['datetime'];
            $d->header = json_encode($data['header']);
            $d->status = $data['status'];
            $d->save();

            return $d;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
