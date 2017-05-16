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
