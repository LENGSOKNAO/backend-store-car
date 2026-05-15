<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'listing_id',
        'reported_user_id',
        'reason',
        'description',
        'status'
    ];

    /**
     * User who created the report (reporter)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Reported listing (optional)
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(CarListing::class, 'listing_id');
    }

    /**
     * Reported user (optional seller/user)
     */
    public function reportedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }
}