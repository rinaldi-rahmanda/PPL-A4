<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    //
    protected $fillable = [
        'domicile','user_id', 'type', 'breed','sex','age','done','description',
    ];
}
