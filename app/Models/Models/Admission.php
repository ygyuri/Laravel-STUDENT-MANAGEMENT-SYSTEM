<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admissions';

    protected $fillable = ['name', 'email', 'phone', 'message'];
}
