<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{ 
    protected $fillable = [
    'customer', 'currency', 'invoicedate', 'duedate',
    'invoicenumber','ordernumber','subtotal','tax','total',
   'details',
];

public function invoice_products(){
    return $this->hasMany('App\InvoiceProduct');
    // return $this->hasMany(InvoiceProduct::class)
}
}

// 'product_total_price','product_name','product_quantity','product_tax','product_line_total'