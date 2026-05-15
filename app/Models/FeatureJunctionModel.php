<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureJunctionModel extends Model
{
    protected $table = 'car_features_junction';

    protected $fillable = [
        'feature_id', 
        'listing_id'
    ];

    public function listing():BelongsTo
    {
        return $this->belongsTo(CarListing::class,'listing_id');
    }
}
