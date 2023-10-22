<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Eventbooking extends Model
{
    use HasFactory;

    protected $table = "eventbooking";

    protected $fillable = [
        'eventbooking_id',
        'user_id',
        'venue_id',
        'reserved_date',
        'reservation_status',
        'date_created'
    ];

    public static function newBooking($data){

        DB::table('eventbooking')
            ->insert([
                'user_id' => $data['user_id'],
                'venue_id' => $data['venue_id'],
                'reserved_date' => $data['reserved_date'],
        ]);

    }

    public static function confirmPayment($data){

        DB::table('eventbooking')
            ->where('eventbooking_id',$data['id'])
            ->update([
                'reservation_status' => 'Reserved'
        ]);

    }

    public static function updateEvent($start_date,$id){

        DB::table('eventbooking')
            ->where('eventbooking_id',$id)
            ->update([
                'reserved_date' => $start_date
        ]);
    }

    public static function eventCancel($data){
        DB::table('branch')
            ->where('eventbooking_id',$data['id'])
            ->delete();
    }
}
