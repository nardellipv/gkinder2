<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'activity', 'description', 'date_start', 'date_end', 'room_id', 'school_id',
    ];

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
