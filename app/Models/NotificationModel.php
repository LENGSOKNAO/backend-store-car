<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $table = 'push_notifications';

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'type',
        'is_read'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}