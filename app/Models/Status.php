<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Status extends Model
{
    protected $fillable = [
        'name',
        'description',
        'enabled',
    ];

    protected $casts = [
        'enabled' => 'bool',
    ];

    public function statusable(): MorphTo
    {
        return $this->morphTo();
    }
}
