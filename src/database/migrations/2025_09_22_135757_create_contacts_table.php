<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender');
            $table->string('email');
            $table->string('tel1');
            $table->string('tel2');
            $table->string('tel3');
            $table->string('address');
            $table->string('building')->nullable();
            $table->text('message');
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
        Schema::dropIfExists('contacts') ;
    }
}