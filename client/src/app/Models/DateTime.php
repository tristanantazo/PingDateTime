<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateTime extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'date_time';
}
