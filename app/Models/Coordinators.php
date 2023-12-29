<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CoordinatorsEvents;
use App\Models\CoordinatorsAlbums;

class Coordinators extends Model
{
    use HasFactory;

    protected $table = 'coordinators';

    protected $primaryKey = 'coordinator_id';

    public $timestamps = false;

    protected $fillable = [
        'coordinator_id',
        'user_id',
        'price',
        'description',
        'main_photo',
        'additional_photos',
        'date_created'
    ];

    public function coordinatorUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coordinatorEvents()
    {
        return $this->hasMany(CoordinatorsEvents::class, 'coordinator_id', 'coordinator_id');
    }

    public function CoordinatorsAlbums()
    {
        return $this->hasMany(CoordinatorsAlbums::class, 'coordinator_id', 'coordinator_id');
    }

    public static function addOrUpdateCoordinator($data){
        
        
        if(!empty($data['main_photo'])){

            if(!empty($data['additional_photos'])){
            
                $otherpics = [];

                foreach($data->file('additional_photos') as $file)
                {
                    array_push($otherpics,$file->getClientOriginalName());
                }

                $additionalPhotos = implode(",",$otherpics);
                
                DB::table('coordinators')
                    ->updateOrInsert(
                    [
                        'user_id' => $data['user_id'], 
                    ],
                    [
                        'price' => $data['price'],
                       
                        'description' => $data['description'],
                        'main_photo' => $data->file('main_photo')->getClientOriginalName(),
                        'additional_photos' => $additionalPhotos
                    ]
                );
            }
            else{
                
                DB::table('coordinators')
                    ->updateOrInsert(
                    [
                        'user_id' => $data['user_id'], 
                    ],
                    [
                        'price' => $data['price'],
                    
                        'description' => $data['description'],
                        'main_photo' => $data->file('main_photo')->getClientOriginalName(),
                    ]
                );
            }
        }
        else{
            if(!empty($data['additional_photos'])){
            
                $otherpics = [];

                foreach($data->file('additional_photos') as $file)
                {
                    array_push($otherpics,$file->getClientOriginalName());
                }

                $additionalPhotos = implode(",",$otherpics);
                
                DB::table('coordinators')
                    ->updateOrInsert(
                    [
                        'user_id' => $data['user_id'], 
                    ],
                    [
                        'price' => $data['price'],
                     
                        'description' => $data['description'],
                        'additional_photos' => $additionalPhotos
                    ]
                );
            }
            else{
                DB::table('coordinators')
                    ->updateOrInsert(
                    [
                        'user_id' => $data['user_id'], 
                    ],
                    [
                        'price' => $data['price'],
                      
                        'description' => $data['description'],
                    ]
                );
            }
        }
        
    }
}
