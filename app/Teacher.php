<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $filliable = [
        'name', 'last_name', 'phone', 'address', 'email', 'school_id', 'observation',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }
}
