<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attachment extends Model
{
    protected $fillable = [
        'path',
        'name',
        'size',
    ];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}
