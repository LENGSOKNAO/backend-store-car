<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $table = 'inquiries';

    protected $fillable = [
        'listing_id',
        'buyer_id',
        'seller_id',
        'message',
        'phone_number',
        'preferred_contact',
        'status'
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(CarListing::class);
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}