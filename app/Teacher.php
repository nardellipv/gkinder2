<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $filliable = [
        'name', 'last_name', 'phone', 'address', 'email', 'school_id',
    ];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
