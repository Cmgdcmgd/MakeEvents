<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\VenuesEvents;
use App\Models\VenuesServices;
use App\Models\VenuesAmeneties;
use App\Models\User;
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

    public function venueEvents()
    {
        return $this->hasMany(VenuesEvents::class, 'venue_id', 'venue_id');
    }

    public function venueAmenities()
    {
        return $this->hasMany(VenuesAmeneties::class, 'venue_id', 'venue_id');
    }

    public function venueServices()
    {
        return $this->hasMany(VenuesServices::class, 'venue_id', 'venue_id');
    }

    public function venueUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function addVenue($data,$mainPhotoName,$additionalPhotos,$packagePhotoName){
        $id = DB::table('venues')
            ->insertGetId([
                'user_id' => session('userid'),
                'venue_name' => $data['venue_name'],
                'price' => $data['price'],
                'email_address' => $data['email_address'],
                'location' => $data['location'],
                'contact_number' => $data['contact_number'],
                'main_photo' => $mainPhotoName,
                'package_photo' => $packagePhotoName,
                'additional_photos' => $additionalPhotos,
                'bank' => $data['bank'],
                'description' => $data['description'],
                'sales_representative' => $data['sales_representative'],
                'booking_allowed' => $data['booking_allowed'],
                'max_capacity' => $data['max_capacity'],
        ]);
        return $id;
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

        if(!empty($data['package_photo'])){
            $package_photo = $data->file('package_photo');
            $package_photo = $package_photo->getClientOriginalName();

            DB::table('venues')
                ->where('venue_id',$data['venue_id'])
                ->update([
                    'package_photo' => $package_photo
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
                'description' => $data['description'],
                'sales_representative' => $data['sales_representative'],
                'booking_allowed' => $data['booking_allowed'],
                'max_capacity' => $data['max_capacity'],

        ]);
    }

    
}
