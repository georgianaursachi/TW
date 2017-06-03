<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public $timestamps = false;//our table ALLERGENS doesn't have created_at and updated_at columns as expected
    protected $table = 'ALLERGENS';
    
    /**
    *many to many relationship between Products and Allergens
    */
    
    public function allergens(){    
        return $this->belongsToMany('App\Allergen', 'allergens_products', 'allergen_id', 'product_id');
    }
    
    /**
    *many to many relationship between Users and Allergens
    */
    
    public function userAllergens(){    
        return $this->belongsToMany('App\Allergen', 'allergens_users', 'user_id', 'allergen_id');
    }
}
