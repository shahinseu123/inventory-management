<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('amount');
            $table->bigInteger('account');
            $table->string('currency');
            $table->text('description');
            $table->string('vendor');
            $table->string('category');
            $table->string('paymentmethod');
            $table->bigInteger('refarence');
            $table->timestamps();
        });
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
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
