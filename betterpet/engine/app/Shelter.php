<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = [
     
	'domicile','id', 'shelterName', 'address','description',
    ];
}
