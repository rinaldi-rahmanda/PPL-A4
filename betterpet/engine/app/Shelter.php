<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
	
	
	public $timestamps = false;
    protected $fillable = [
     
	'domicile','id', 'shelterName', 'address','description','user_id'
    ];

}
