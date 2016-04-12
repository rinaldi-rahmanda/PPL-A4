<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    //
    protected $fillable = [
        'domicile', 'type', 'breed','sex','color','age','done','description',
    ];
     public function user(){
        return $this->belongsTo(User::class);
    }
}
