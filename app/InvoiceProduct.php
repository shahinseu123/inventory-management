<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $fillable = [
        'productname','quantity','price','tax','linetotal','invoice_id'
    ];

    public function invoice(){
        return $this->belongsTo('App\Invoice');
        // return $this->belongsTo(Invoice::class);
    }
}
