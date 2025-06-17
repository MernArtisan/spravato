<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'image_path',
        'type',
        'price',
        'status',
        'user_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Accessor for formatted price.
     */
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     * Accessor for capitalized type.
     */
    public function getFormattedTypeAttribute(): string
    {
        return ucfirst($this->service_type);
    }

    /**
     * Accessor for human-readable status.
     */
    public function getFormattedStatusAttribute(): string
    {
        return ucfirst($this->status);
    }

    /**
     * Relationship with User who created the service.
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
