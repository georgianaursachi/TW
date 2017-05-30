<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\ContactFormRequest;
use App\Enumber;
use App\Product;
use Session;
use Charts;
use Image;
use Auth;
use Mail;
use DB;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function euri(){
        
        $chart = (new Enumber)->chart();
        
        return view('posts.euri', compact('chart'));
    }
    
    public function euri_name($input, Request $request){
    
        $input = $request->input('euri');
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
    
    public function produse_name($input, Request $request){
        
        $input = $request->input('produs');
        
        $products = Product::with('enumbers')
            ->with('allergens')
            ->whereRaw('UPPER(product_name) like UPPER(?)', array( $input.'%'))
            ->orWhere('bar_code',$input)
            ->get();
        
        return view('posts.produse-name', compact('products'));
       
    }
    
    public function getContact(){
        return view('posts.contact');
    }
    
    public function postContact(ContactFormRequest $request){
        
       $data = array(
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
        );
        
        Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('contact@condr.com');
			$message->subject($data['subject']);
		});
        
        return \Redirect::route('contact')->with('message', 'Mulțumim pentru e-mail!');
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
    
    public function update_avatar(Request $request){
        
        //Handle the user upload avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename) );
            
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        
        return view('posts.profil');
    }
    
    public function setari(){
        return view('posts.setari');
    }
    
}
