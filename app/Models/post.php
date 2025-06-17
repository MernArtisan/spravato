<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    
    protected $fillable = [
        'user_id',
        'content',
        'file_path',
    ];

    public function postmedia()
    {
        return $this->hasMany(postmedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function likes()
    {
        return $this->hasMany(likes::class);
    }

}
