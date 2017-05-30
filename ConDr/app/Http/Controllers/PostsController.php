<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use Image;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
