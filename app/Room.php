<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'school_id',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }

    public function Teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
