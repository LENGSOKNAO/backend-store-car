<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellerReview extends Model
{
    protected $table = 'seller_reviews';

    protected $fillable = [
        'reviewer_id',
        'user_id',
        'listing_id',
        'rating',
        'communication_rating',
        'accuracy_rating',
        'comment',
        'is_verified_purchase'
    ];

    // Buyer who wrote review
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    // Seller being reviewed
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Related listing
    public function listing(): BelongsTo
    {
        return $this->belongsTo(CarListing::class, 'listing_id');
    }
}