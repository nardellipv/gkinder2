<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $filliable = [
        'activity', 'description', 'date', 'room_id', 'school_id',
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
