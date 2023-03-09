<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\DateTime::factory(10)->create([
            'body' => Carbon::now(),
            'status' => 200,
            'header' => '{"Access-Control-Allow-Origin":["*"],"Content-Type":["application\/json"],"Date":["Wed, 08 Mar 2023 13:28:29 GMT"],"Server":["Caddy"],"X-Rate-Limit-Duration":["1"],"X-Rate-Limit-Limit":["10.00"],"X-Rate-Limit-Request-Forwarded-For":["136.158.8.178"],"X-Rate-Limit-Request-Remote-Addr":["172.17.0.1:45748"],"Transfer-Encoding":["chunked"]}'
        ]);
    }
}
