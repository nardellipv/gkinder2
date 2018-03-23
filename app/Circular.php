<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'body', 'date', 'active', 'school_id',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}
