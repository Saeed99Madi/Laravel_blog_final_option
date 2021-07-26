<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
    ];
//    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }
//    public function setAvatarAttribute($value){
//        return asset($value);
//    }


    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class );

    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }



    public function userHasRole($role_name){
        foreach ($this->roles as $role){
            if(Str::lower($role) == Str::lower($role_name)){
                return true;
            }
            return false;
        }
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
