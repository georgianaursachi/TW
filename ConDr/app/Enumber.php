<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Charts;

class Enumber extends Model
{
    protected $table = 'ENUMBER';//our table name=ENUMBER not ENUMBERS
    public $timestamps = false;//our table PRODUCTS doesn't have created_at and updated_at columns as expected
    public $incrementing = false;
    
    public function chart(){
        $distribution = Enumber::orderBy('distribution', 'desc')
            ->take(10)
            ->get();
        
        $chart = Charts::create('bar', 'highcharts')
            ->title('Distributia E-urilor in produse')
            ->elementLabel('Proporție')
            ->labels($distribution->pluck('id'))
            ->values($distribution->pluck('distribution'))
            ->dimensions(0,0)
            ->responsive(true);
        
        return $chart;
    }
    
    /**
    *many to many relationship between Products and Enumber
    */
    
    public function products(){
        return $this->belongsToMany('App\Product', 'enumber_products', 'enumber_id', 'products_id');
    }
    
}
