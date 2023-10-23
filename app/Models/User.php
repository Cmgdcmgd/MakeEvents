<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'contact_number',
        'user_type',
        'status',
        'profile_picture',
        'date_created'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function addUser($data){

        if(!empty($data['profpic'])){

            $file = $data->file('profpic')->getClientOriginalName();

            DB::table('users')
                ->insert([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
                    'profile_picture' => $file
            ]);
        }
        else{
            DB::table('users')
                ->insert([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
            ]);
        }
    }

    public static function editUser($data){

        if(!empty($data['profpic'])){

            $file = $data->file('profpic')->getClientOriginalName();

            if(!empty($data['password'])){

                DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
                    'profile_picture' => $file
                ]);
            }
            else{
                DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
                    'profile_picture' => $file
                ]);
            }
            
        }
        else{

            if(!empty($data['password'])){
                DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
                ]);
            }
            else{
                DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['user_type'],
                ]);
            }
            
        }
    }

    public static function editCoordinator($data){

        if(!empty($data['profpic'])){

            $file = $data->file('profpic')->getClientOriginalName();

            DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'contact_number' => $data['contact_number'],
                    'profile_picture' => $file
            ]);
        }
        else{
            DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'contact_number' => $data['contact_number'],
            ]);
        }

    }

    public static function addCustomer($data){

        DB::table('users')
                ->insert([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email_address'],
                    'password' => Hash::make($data['password']),
                    'contact_number' => $data['contact_number'],
                    'user_type' => $data['membertype'],
            ]);
    }

    public static function editCustomer($data){

        DB::table('users')
                ->where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email_address'],
                    'contact_number' => $data['contact_number'],
            ]);

    }
}
