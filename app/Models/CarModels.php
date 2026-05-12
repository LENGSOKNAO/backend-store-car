<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class CarModels extends Model
{
    protected $table = 'tblcar_models';
    protected $fillable = [
         'car_makes_id',
        'name',
        'start_year',
        'end_year'
    ];
    public function carMakes() : HasMany
    {
        return $this->hasMany(CarMakes::class);
    }
}
