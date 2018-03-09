<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'activity', 'description', 'date', 'room_id', 'school_id',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
