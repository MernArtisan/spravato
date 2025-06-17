<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{ 
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'image',
        'bio',
        'address',
        'cover_image',
        'phone',
        'dob',
        'gender',
        'country',
        'language',
        'state',
        'city',
        'zip',
        'education',
        'workplace',
        'position'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function provider(){
        return $this->hasOne(Provider::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
