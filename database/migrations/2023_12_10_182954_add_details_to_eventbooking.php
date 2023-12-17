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
        Schema::table('eventbooking', function (Blueprint $table) {
            $table->time('time_start')->after('venue_id');
            $table->time('time_end')->after('venue_id');
            $table->string('event_name', 100)->after('venue_id');
            $table->string('client_name')->after('venue_id');
            $table->integer('number_of_guests')->after('venue_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventbooking', function (Blueprint $table) {
            $table->dropColumn('time_start');
            $table->dropColumn('time_end');
            $table->dropColumn('event_name');
            $table->dropColumn('client_name');
            $table->dropColumn('number_of_guests');
        });
    }
};
