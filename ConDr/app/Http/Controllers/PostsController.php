<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use App\Enumber;
use App\Product;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }
    
    public function euri(){
        
        $chart = (new Enumber)->chart();
        
        return view('posts.euri', compact('chart'));
    }
    
    public function euri_name(){
    
        $input = $_GET['euri'];
        $input = '%'.$input.'%';
    
        $enumber = Enumber::whereRaw('UPPER(id) like UPPER(?)', array( $input))
            ->orWhereRaw('UPPER(name) like UPPER(?)', array( $input))
            ->get();
        
        $chart = (new Enumber)->chart();
    
        return view('posts.euri-name',compact ('enumber','chart'));
    }
    
    public function produse(){
        return view('posts.produse');
    }
    
    public function produse_name(){
        
        $input = $_GET['produs'];
        
        $products = Product::with('enumbers')
            ->with('allergens')
            ->whereRaw('UPPER(product_name) like UPPER(?)', array( $input.'%'))
            ->orWhere('bar_code',$input)
            ->get();
        
        return view('posts.produse-name', compact('products'));
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
