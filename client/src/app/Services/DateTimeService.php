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

    public function callDateTimeApi()
    {
        try {
            $response = Http::get('https://api.publicapis.org/entries');

            $data['header'] = $response->headers();
            $data['status'] = $response->status();
            $data['body'] = $response->body();
            return self::saveDateTime($data);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveDateTime($data)
    {
        try {
            $d = new DateTime;
            $d->body = Carbon::now();
            // $d->body = $data['body'];
            $d->header = json_encode($data['header']);
            $d->status = $data['status'];
            $d->save();

            return $d;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
