<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarMakes extends Model
{
    protected $table ='tblcar_makes';
    protected $fillable = [
        'name','logo_url','country'
    ];
    public function carModel() : BelongsTo{
        return $this->belongsTo(carModels::class);
    }
}
