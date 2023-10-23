<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Coordinatorbooking extends Model
{
    use HasFactory;

    protected $table = "coordinatorbooking";

    protected $fillable = [
        'coordinatorbooking_id',
        'coordinator_id',
        'booked_by',
        'reserved_date',
        'reservation_status',
        'date_created'
    ];


    public static function newBooking($data){

        DB::table('coordinatorbooking')
            ->insert([
                'coordinator_id' => $data['coordinator_id'],
                'booked_by' => $data['user_id'],
                'reserved_date' => $data['reserved_date'],
        ]);

    }

    public static function confirmPayment($data){

        DB::table('coordinatorbooking')
            ->where('coordinatorbooking_id',$data['id'])
            ->update([
                'reservation_status' => 'Reserved'
        ]);

    }

    public static function updateEvent($start_date,$id){

        DB::table('coordinatorbooking')
            ->where('coordinatorbooking_id',$id)
            ->update([
                'reserved_date' => $start_date
        ]);
    }

    public static function eventCancel($data){
        DB::table('coordinatorbooking')
            ->where('coordinatorbooking',$data['id'])
            ->delete();
    }

}
