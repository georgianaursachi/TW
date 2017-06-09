<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //our table PRODUCTS doesn't have created_at and updated_at columns as expected
    
    /**
    *many to many relationship between Products and Enumber
    */
    
    public function enumbers(){    
        return $this->belongsToMany('App\Enumber', 'enumber_products', 'products_id', 'enumber_id');
    }
    
    /**
    *many to many relationship between Products and Allergens
    */
    
    public function allergens(){    
        return $this->belongsToMany('App\Allergen', 'allergens_products', 'product_id', 'allergen_id');
    }
    
    /**
    *a product has many comments
    */
    public function comments(){
        return $this->hasMany('App\Comment', 'product_id' );
    }
    
}
