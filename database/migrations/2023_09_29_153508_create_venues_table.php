<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id('venue_id');
            $table->string('venue_name');
            $table->string('price');
            $table->string('description');
            $table->string('main_photo');
            $table->string('additional_photos');
            $table->string('email_address');
            $table->string('location');
            $table->string('contact_number');
            $table->string('availability')->default('open');
            $table->string('paid')->default('no');
            $table->string('bank');
            $table->integer('status')->default('1');
            $table->timestamp('date_created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
};
