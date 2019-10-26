<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electronic extends Model
{
    protected $fillable = [
        'code','name', 'model', 'quality', 'company'
    ];
}
