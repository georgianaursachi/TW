<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use Image;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Enumber;
use App\Product;
use App\Diseases;
use App\Allergen;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\CommentFormRequest;
use Mail;
use App\Comment;

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
        $user = Auth::user();
        $id = $user->id;
        
        $products = Product::with('enumbers')
            ->with('allergens')
            ->with('comments')
            ->whereRaw('UPPER(product_name) like UPPER(?)', array( $input.'%'))
            ->orWhere('bar_code',$input)
            ->get();
        
        $userAllergens = Allergen::with('allergens')
                ->join('allergens_users', 'allergens.id', '=', 'allergens_users.allergen_id')
                ->where('allergens_users.user_id', '=', $id)
                ->get();
        //for advice
        if(count($products)>0){
            $advice = DB::selectOne("select  USERPACKAGE.VALIDATE_PRODUCT(".$products->first()->id.",".$id." ) as value from dual");
        
        
            switch ($advice->value) {
                case -1: $adviceMessage = "Acest produs conține prea multa sare pentru dumneavoastră!"; break;
                case -2: $adviceMessage = "Acest produs conține prea mult zahăr pentru dumneavoastră!"; break;
                case -3: $adviceMessage = "Acest produs conține prea multe grăsimi pentru dumneavoastră!"; break;
                case -4: $adviceMessage = "Acest produs conține prea mulți carbohidrați pentru dumneavoastră!"; break;
                case -5: $adviceMessage = "Acest produs conține prea multe fibre pentru dumneavoastră!"; break;
                case -6: $adviceMessage = "Acest produs conține prea multe proteine pentru dumneavoastră!"; break;
                case -7: $adviceMessage = "Acest produs conține prea multe grăsimi grasimi saturate pentru dumneavoastră!"; break;
                default:
                    $adviceMessage = "Acest produs nu reprezinta riscuri pentru bolile dumnevoastra!"; break;}
        }
            else $adviceMessage= "null";
        //for recomanded product
        $recomandation = DB::selectOne("select  RECOMANDARI_PRODUS(".$id." ) as value from dual");
        $productRecomandation = Product::where('id', $recomandation->value)->get();
        
        return view('posts.produse-name', compact('products', 'userAllergens', 'adviceMessage', 'productRecomandation'));
       
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
    
     public function profil(){
        return view('posts.profil');
    }
    
    public function profil_table(){
        $user = Auth::user();
        $id = $user->id;
        
        $diseases = Diseases::with('diseases')
                ->join('user_disease', 'diseases.id', '=', 'user_disease.disease_id')
                ->where('user_disease.user_id', '=', $id)
                ->get();
        
        $allergens = Allergen::with('allergens')
                ->join('allergens_users', 'allergens.id', '=', 'allergens_users.allergen_id')
                ->where('allergens_users.user_id', '=', $id)
                ->get();
        
        return view('posts.profil', compact('diseases','allergens'));
        
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
        
        return $this->profil_table();
    }
    
    public function setari(){
        return view('posts.setari');
    }
    
}
