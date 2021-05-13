<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Relación uno a uno
    public function observation(){
        return $this->hasOne('App\Models\Observation');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function requierements(){
        return $this->hasMany('App\Models\Requirement');
    }
        
    //con Goal
        
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
        
        
    //con Audience
        
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
        
        
    //con section
        
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }
        

//Relacion uno a muchos inversa
public function teacher(){
    return $this->belongsTo('App\Models\User', 'user_id');
 }

 //Relacion uno a muchos inversa

public function level(){
    return $this->belongsTo('App\Models\Level');
    }

//Relacion uno a muchos inversa

public function category(){
    return $this->belongsTo('App\Models\Level');
    }

    //con Price

    public function price(){
    return $this->belongsTo('App\Models\Price');
    }

    //Relacion muchos a muchos
public function students(){
    return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica

public function image(){
    return $this->morphOne('App\Models\Image', 'imageable');
    }
//Relacion hasManyThrough
public function lessons(){
    return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

}
