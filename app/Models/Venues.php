<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venues extends Model
{
    use HasFactory;

    protected $table = 'venues';

    protected $fillable = [
        'venue_id',
        'venue_name',
        'price',
        'description',
        'main_photo',
        'additional_photos',
        'email_address',
        'location',
        'contact_number',
        'availability',
        'paid',
        'status',
        'date_created'
    ];

    public static function addVenue($data,$mainPhotoName,$additionalPhotos){
        DB::table('venues')
            ->insert([
                'user_id' => session('userid'),
                'venue_name' => $data['venue_name'],
                'price' => $data['price'],
                'email_address' => $data['email_address'],
                'location' => $data['location'],
                'contact_number' => $data['contact_number'],
                'main_photo' => $mainPhotoName,
                'additional_photos' => $additionalPhotos,
                'bank' => $data['bank'],
                'description' => $data['description']
        ]);
    }

    public static function editVenue($data){

        if(!empty($data['main_photo'])){
            $mainPhoto = $data->file('main_photo');
            $mainPhotoName = $mainPhoto->getClientOriginalName();

            DB::table('venues')
                ->where('venue_id',$data['venue_id'])
                ->update([
                    'main_photo' => $mainPhotoName
            ]);
        }

        if(!empty($data['additional_photos'])){

            $additionalPics = [];
        
            foreach($data->file('additional_photos') as $file){
                array_push($additionalPics,$file->getClientOriginalName());
            }

            $additionalPhotos = implode(",",$additionalPics);

            DB::table('venues')
                ->where('venue_id',$data['venue_id'])
                ->update([
                    'additional_photos' => $additionalPhotos
            ]);

        }


        DB::table('venues')
            ->where('venue_id',$data['venue_id'])
            ->update([
                'venue_name' => $data['venue_name'],
                'price' => $data['price'],
                'email_address' => $data['email_address'],
                'location' => $data['location'],
                'contact_number' => $data['contact_number'],
                'bank' => $data['bank'],
                'description' => $data['description']
        ]);
    }

    
}
