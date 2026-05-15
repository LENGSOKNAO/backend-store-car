<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ListingFeatureModel extends Model
{
    protected $table = 'listings_feature';

    protected $fillable = [
        'feature_id',
        'name_feature',
        'category'
    ];

    public function feature():HasOne
    {
        return $this->hasOne(FeatureJunctionModel::class, 'feature_id');
    }
}
