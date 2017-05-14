<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }
    
    public function euri(){
        return view('posts.euri');
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
}
