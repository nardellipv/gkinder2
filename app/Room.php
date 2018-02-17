<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $filliable = [
        'name', 'school_id',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
