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
        Schema::create('eventbooking', function (Blueprint $table) {
            $table->id('eventbooking_id');
            $table->integer('user_id');
            $table->integer('venue_id');
            $table->string('reserved_date');
            $table->string('reservation_status')->default('Pending Payment');;
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
        Schema::dropIfExists('eventbooking');
    }
};
