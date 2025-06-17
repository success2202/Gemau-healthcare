<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_appoints', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
           $table->string('service')->nullable();
            $table->text('message')->nullable();
            $table->dateTime('appointment_date');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_appoints');
    }
}
