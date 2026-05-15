<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceAlert extends Model
{
    protected $table = 'price_alerts';

    protected $fillable = [
        'user_id',
        'make_id',
        'model_id',
        'min_price',
        'max_price',
        'is_active'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function make(): BelongsTo
    {
        return $this->belongsTo(CarMakes::class, 'make_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModels::class, 'model_id');
    }
}