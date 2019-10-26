<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'vendor','currency', 'billdate', 'duedate', 'billnumber', 'ordernumber', 'subtotal', 'tax', 'details', 'total'
    ];
}
