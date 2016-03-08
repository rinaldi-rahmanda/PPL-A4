<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password',
    ];
     public function user(){
        return $this->belongsTo(User::class);
    }
}
