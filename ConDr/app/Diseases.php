<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    public $timestamps = false;//our table DISEASES doesn't have created_at and updated_at columns as expected
    
    protected $fillable = ['id', 'disease_name', 'description', 'salt', 'sugar', 'fats', 'carbohydrate', 'fiber', 'protein', 'calories', 'saturates'];
    /**
    *many to many relationship between Users and Diseases
    */
    
    public function diseases(){    
        return $this->belongsToMany('App\Diseases', 'user_disease', 'user_id', 'disease_id');
    }
}
