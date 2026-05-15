<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDevice extends Model
{
    protected $table = 'user_devices';

    protected $fillable = [
        'user_id',
        'device_token',
        'platform',
        'app_version',
        'last_used'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}