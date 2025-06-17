<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(post::class);
    }
}
