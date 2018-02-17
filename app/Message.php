<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    protected $filliable = [
        'title', 'body', 'date',
    ];

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class);
    }

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}
