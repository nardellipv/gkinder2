<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $filliable = [
        'name', 'last_name', 'phone', 'dni', 'address', 'email',
    ];

    public function Messages()
    {
        return $this->belongsToMany(Message::class);
    }

    public function Students()
    {
        return $this->hasMany(Student::class);
    }
}
