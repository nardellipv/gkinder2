<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Comunication extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title', 'body', 'date', 'school_id', 'tutor_id', 'room_id'
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}
