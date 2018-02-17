<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $filliable = [
        'name', 'last_name', 'dni', 'sex', 'birth_date', 'school_id',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
    
    public function Tutors()
    {
        return $this->belongsToMany(Tutor::class);
    }
}
