<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarMake extends Model
{
    protected $table = 'car_makes';

    protected $fillable = [
        'name',
        'logo_url',
        'country'
    ];

    public function carModel() : BelongsTo
    {
        return $this->belongsTo(CarMoldels::class);
    }
}
