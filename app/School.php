<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'cp', 'phone', 'active', 'account', 'url', 'email',
    ];

    public function Student()
    {
        return $this->hasMany(Student::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function Calendars()
    {
        return $this->hasMany(Calendar::class);
    }

    public function Messages()
    {
        return $this->hasMany(Message::class);
    }

    public function Rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function Teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
