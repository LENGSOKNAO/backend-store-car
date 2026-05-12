<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingImage extends Model
{
    protected $table = 'listing_images';

    protected $fillable = [
        'listing_id',
        'image_url',
        'is_primary',
        'sort_order',
        'uploaded_at'
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(CarListing::class, 'listing_id');
    }
}