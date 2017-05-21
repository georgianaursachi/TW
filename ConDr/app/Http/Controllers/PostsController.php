<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }
    
    public function euri(){
        
        $values = array();
        $labels = array();
        
        $distribution = DB::table('enumber')->select('id','distribution')->orderBy('distribution', 'desc')->take(10)->get();
       
            foreach ($distribution as $d) {
                $values[] = $d->distribution;
                $labels[] = $d->id;
                
                }
          
        
        $chart = Charts::create('bar', 'highcharts')
            ->title('Distributia E-urilor in produse')
            ->elementLabel('Proporție')
            ->labels($labels)
            ->values($values)
            ->dimensions(0,0)
            ->responsive(true);
        
        return view('posts.euri',['chart' => $chart]);
    }
    
    public function euri_name(){
    
        $input = $_GET['euri'];
    
        $enumber = DB::table('enumber')->where('id', $input)->orWhere('name', $input)->get();
        
        $values = array();
        $labels = array();
        
        $distribution = DB::table('enumber')->select('id','distribution')->orderBy('distribution', 'desc')->take(10)->get();
       
            foreach ($distribution as $d) {
                $values[] = $d->distribution;
                $labels[] = $d->id;
                
                }
          
        
        $chart = Charts::create('bar', 'highcharts')
            ->title('Distributia E-urilor in produse')
            ->elementLabel('Proporție')
            ->labels($labels)
            ->values($values)
            ->dimensions(0,0)
            ->responsive(true);
        
    
        return view('posts.euri-name',['enumber' =>$enumber, 'chart' => $chart]);
    }
    
    public function produse(){
        return view('posts.produse');
    }
    
    public function contact(){
        return view('posts.contact');
    }
    
    public function adauga(){
        return view('posts.adauga');
    }
    
     public function test(){
        return view('posts.test');
    }
    
     public function profil(){
        return view('posts.profil');
    }
    
    public function setari(){
        return view('posts.setari');
    }
    
    public function login(){
        return view('posts.login');
    }
    
    public function login_register(){
        return view('posts.login_register');
    }
    
    public function login_password(){
        return view('posts.login_password');
    }
}
