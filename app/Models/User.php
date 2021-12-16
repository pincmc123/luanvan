<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table='users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'status',
        'role',
    ];
    public function getListuser()
    {
      return user::get();
    }
    public function getUser($id){
        return user::find($id);
    }
    public  function updateUser($data,$id)
    {
        $user=user::find($id);
        $user->name=$data->name;
        $user->gender=$data->gender;
        $user->phone=$data->phone;
        $user->status=$data->status;
        $user->save();
        return 'True';
    }
    public function createUser($data)
    {
        $user=user::create([
            'name'=>$data->name,
            'gender'=>$data->gender,
            'phone'=>$data->phone,
            'email'=>$data->email,
            'status'=>$data->status,
            'role'=>$data->role,
            'password'=>bcrypt($data->password),
        ]);
        return $user;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
