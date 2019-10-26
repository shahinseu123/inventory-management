<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    protected $fillable = [
        'productname', 'quantity', 'price', 'tax', 'linetotal'
    ];
}
