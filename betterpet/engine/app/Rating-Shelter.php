<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating-Shelter extends Model
{
    //
    protected $fillable = [
        'shelter_id', 'user_id', 'rating', 'comment',
    ];
}
