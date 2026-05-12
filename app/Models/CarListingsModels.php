<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarListing extends Model
{
    protected $table = 'car_listings';

    protected $fillable = [
        'user_id',
        'make_id',
        'model_id',
        'year',
        'price',
        'original_price',
        'mileage',
        'fuel_type',
        'transmission',
        'engine_size',
        'color',
        'interior_color',
        'condition',
        'number_of_owners',
        'vin',
        'license_plate',
        'description',
        'location',
        'views_count',
        'status',
        'expires_at'
    ];

    // Seller (User)
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Car Make
    public function make(): BelongsTo
    {
        return $this->belongsTo(CarMakes::class, 'make_id');
    }

    // Car Model
    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModels::class, 'model_id');
    }
}