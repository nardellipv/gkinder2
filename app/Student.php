<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $filliable = [
        'name', 'last_name', 'dni', 'sex', 'birth_date', 'observation', 'school_id', 'room_id', 'tutor_id',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    public function Tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
