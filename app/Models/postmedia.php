<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postmedia extends Model
{
     protected $fillable = [
        'post_id',
        'path',
        'type',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
