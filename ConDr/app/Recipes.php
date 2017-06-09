<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $table = 'RECIPES';
    public $timestamps = false;
    
    protected $fillable = ['id', 'recipe_name', 'description', 'method_of_preparation', 'salt', 'sugar', 'fats', 'carbohydrate', 'fiber', 'protein', 'calories', 'saturates'];
}
