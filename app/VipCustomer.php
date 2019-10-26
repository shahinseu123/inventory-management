<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VipCustomer extends Model
{
    protected $fillable = [
        'name', 'email', 'contact', 'company'
    ];
}
