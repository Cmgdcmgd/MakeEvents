<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coordinators extends Model
{
    use HasFactory;

    protected $table = 'coordinators';

    protected $fillable = [
        'coordinator_id',
        'user_id',
        'price',
        'description',
        'main_photo',
        'additional_photos',
        'date_created'
    ];

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
                        'bank' => $data['bank'],
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
                        'bank' => $data['bank'],
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
                        'bank' => $data['bank'],
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
                        'bank' => $data['bank'],
                        'description' => $data['description'],
                    ]
                );
            }
        }
        
    }
}
