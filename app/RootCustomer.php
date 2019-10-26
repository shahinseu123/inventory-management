<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RootCustomer extends Model
{
    protected $fillable = [
        'name', 'email', 'contact', 'company'
    ];
}
