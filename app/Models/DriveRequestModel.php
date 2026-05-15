<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestDriveRequest extends Model
{
    protected $table = 'test_drive_requests';

    protected $fillable = [
        'listing_id',
        'buyer_id',
        'seller_id',
        'preferred_date',
        'preferred_time',
        'pickup_location',
        'status',
        'seller_notes',
        'requested_at',
        'confirmed_at'
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