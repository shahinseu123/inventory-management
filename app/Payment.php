<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'date', 'amount', 'account', 'currency', 'description', 'vendor', 'category', 'paymentmethod', 'refarence'
    ];
}

// date: '',
// amount: '',
// account: '',
// currency: '',
// description: '', 
// vendor: '',
// category: '',
// paymentmethod: '',
// refarence: ''