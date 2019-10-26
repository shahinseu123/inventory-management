<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'date', 'amount', 'description', 'catagory', 'customer', 'payment', 'reference'
    ];
}
