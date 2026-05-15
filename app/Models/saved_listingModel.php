<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class saved_listingModel extends Model
{
    protected $table   ='saved_listings';

    protected $Fillable = [
        'user_id',
        'listing_id'
    ];

   public function user():BelongsTo
   {
    return $this->belongsTo(user::class, 'user_id');
   }
   public function listing():BelongsTo
   {
    return $this->belongsTo(CarListing::class , 'listing_id');
    }
}
