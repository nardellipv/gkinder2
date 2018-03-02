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

    public function Calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function Teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
