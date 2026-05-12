<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarMoldels extends Model
{
    protected $table = 'car_models';

    protected $fillable = [
        'car_makes_id',
        'name',
        'start_year',
        'end_year'
    ];

    public function carMake() : HasMany
    {
        return $this->hasMany(CarMake::class);
    }
}
