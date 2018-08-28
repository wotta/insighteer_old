<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Address extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'address',
        'second_address',
        'city',
        'state',
        'postal_code',
        'country_code',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
