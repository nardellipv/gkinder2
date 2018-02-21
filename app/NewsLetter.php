<?php

namespace gkinder;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{

    protected $filliable = [
        'email',
    ];
}
