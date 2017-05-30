<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public $timestamps = false;//our table ALLERGENS doesn't have created_at and updated_at columns as expected
    
    /**
    *many to many relationship between Products and Allergens
    */
    
    public function allergens(){    
        return $this->belongsToMany('App\Allergen', 'allergens_products', 'allergen_id', 'products_id');
    }
}
