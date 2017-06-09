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
use App\User;
use App\Http\Requests\ContactFormRequest;
use Mail;
use App\Recipes;
use Input;
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
         
         if(is_numeric($input))
             $products = Product::with('enumbers')
                ->with('allergens')
                ->with('comments')
                ->where('bar_code',$input)
                ->get();
        else    
            $products = Product::with('enumbers')
                ->with('allergens')
                ->with('comments')
                ->whereRaw('UPPER(product_name) like UPPER(?)', array( $input.'%'))
                //->orWhere('bar_code',$input)
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
			$message->to('project.condr@gmail.com');
			$message->subject($data['subject']);
		});
        
        return \Redirect::route('contact')->with('message', 'Mulțumim pentru e-mail!');
    }
    
    public function adauga(){
        return view('posts.adauga');
    }
    
     public function adaugaProdus(Request $request){
         
           
         $product = new product;
         
         $product->product_name = $request->name;
         $product->category = $request->categories;
         $product->bar_code = $request->barCode;
         $product->description = $request->desricption;
         $product->salt = $request->salt;
         $product->sugar = $request->sugar;
         $product->fats = $request->fats;
         $product->carbohydrate = $request->carbs;
         $product->fiber = $request->fibers;
         $product->protein = $request->proteins;
         $product->calories = $request->calories;
         $product->saturates = $request->saturates;
         
         
         
         $product->save();
         if($request->lapte){
             $a1 = Allergen::where('name', 'lapte')->get();
             $product->allergens()->attach($a1->first());
         }
         
        if($request->ou){
             $a2 = Allergen::where('name', 'oua')->get();
             $product->allergens()->attach($a2->first());
         }
         
        if($request->peste){
             $a3 = Allergen::where('name', 'peste')->get();
             $product->allergens()->attach($a3->first());
         }
         
         if($request->crustacee){
             $a4 = Allergen::where('name', 'crustacee')->get();
             $product->allergens()->attach($a4->first());
         }
         
         if($request->moluste){
             $a5 = Allergen::where('name', 'moluste')->get();
             $product->allergens()->attach($a5->first());
         }
         
         if($request->arahide){
             $a6 = Allergen::where('name', 'arahide')->get();
             $product->allergens()->attach($a6->first());
         }
         
         if($request->nuci){
             $a7 = Allergen::where('name', 'nuci')->get();
             $product->allergens()->attach($a7->first());
         }
         
         if($request->migdale){
             $a8 = Allergen::where('name', 'migdale')->get();
             $product->allergens()->attach($a8->first());
         }
         
         if($request->alune){
             $a9 = Allergen::where('name', 'alune')->get();
             $product->allergens()->attach($a9->first());
         }
         
         if($request->caju){
             $a10 = Allergen::where('name', 'caju')->get();
             $product->allergens()->attach($a10->first());
         }
         
         if($request->pecan){
             $a11 = Allergen::where('name', 'pecan')->get();
             $product->allergens()->attach($a11->first());
         }
         
         if($request->brazils){
             $a12 = Allergen::where('name', 'brazils')->get();
             $product->allergens()->attach($a12->first());
         }
         
         if($request->fistic){
             $a13 = Allergen::where('name', 'fistic')->get();
             $product->allergens()->attach($a13->first());
         }
         
         if($request->nuci_de_macadamia){
             $a14 = Allergen::where('name', 'nuci de macadamia')->get();
             $product->allergens()->attach($a14->first());
         }
         
         if($request->nuci_de_Q){
             $a15 = Allergen::where('name', 'nuci de Queensland')->get();
             $product->allergens()->attach($a15->first());
         }
         
         if($request->seminte_susan){
             $a16 = Allergen::where('name', 'seminte susan')->get();
             $product->allergens()->attach($a16->first());
         }
         
         if($request->cereale){
             $a17 = Allergen::where('name', 'cereale care contin gluten')->get();
             $product->allergens()->attach($a17->first());
         }
         
         if($request->soia){
             $a18 = Allergen::where('name', 'soia')->get();
             $product->allergens()->attach($a18->first());
         }
         
         if($request->telina){
             $a19 = Allergen::where('name', 'telina')->get();
             $product->allergens()->attach($a19->first());
         }
         
         if($request->mustar){
             $a20 = Allergen::where('name', 'mustar')->get();
             $product->allergens()->attach($a20->first());
         }
         
         if($request->lupin){
             $a21 = Allergen::where('name', 'lupin')->get();
             $product->allergens()->attach($a21->first());
         }
         
         if($request->dioxid){
             $a22 = Allergen::where('name', 'dixiod de sulf si sulfiti')->get();
             $product->allergens()->attach($a22->first());
         }
         
        
         return back();
    }
    
     public function test(){
        return view('posts.test');
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
    
    public function profil_table_settings(){
        $users = User::with('diseases')
            ->with('allergens')
            ->where('id', Auth::user()->id)
            ->get();
        
        $disease = DB::table('diseases')->orderBy('disease_name')->get();
        $allergens = DB::table('allergens')->orderBy('name')->get();
        
        return view('posts.setari', compact('users', 'disease', 'allergens'));
        
    }
    
    public function destroy($disease_name){ 
        
        $d = Diseases::where('disease_name', $disease_name)->get();
        DB::delete('delete from user_disease where user_id = ? AND disease_id = ?', array(Auth::user()->id, $d->first()->id));
        
        return back();
    }
    
    
    public function delete_allergen($allergen_name){
        $a = Allergen::where('name', $allergen_name)->get();
        DB::delete('delete from allergens_users where user_id = ? AND allergen_id = ?', array(Auth::user()->id, $a->first()->id));
        
        return back();
    }
    
    public function settings(Request $request){
        $user = Auth::user();
        
        //Handle the user upload avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename) );
            
            $user->avatar = $filename;
            $user->save();
        }
        
        //Add user description
        if ($request->has('description')) {             
            $description = $request->input('description'); 

            $user->description = $description;
            $user->save();         
        }
        
        //Find if checkbox is checked and send recipe via e-mail
        if($request->input('c1')){
            $recipe_id = DB::selectOne("select RECOMANDARE_RETETA(".$user->id.") as value from dual");
    
            $recipes = Recipes::where('id', $recipe_id->value)->get();
            
            $data = array(
                'email' => $user->email,
                'subject' => 'Recomandare rețete',
                'recipe_name' => $recipes->first()->recipe_name,
                'description' => $recipes->first()->description,
                'method_of_preparation' => $recipes->first()->method_of_preparation,
                'picture' => $recipes->first()->picture
            );
            
            Mail::send('emails.recipes', $data, function($message) use ($data) {
                // Set the receiver and subject of the mail.
                $message->to($data['email']);
                // Set the sender
                $message->from('project.condr@gmail.com', 'ConDr');

                $message->subject($data['subject']);
        });
            
        }
        
        //add user disease
        if ($request->has('disease_name')){             
            $disease = $request->disease_name; 
            $d = Diseases::where('disease_name', $disease)->get();
             
            if(count(DB::table('user_disease')->where([['user_id',Auth::user()->id],['disease_id', $d->first()->id],])->get()) == 0 )
                DB::table('user_disease')->insert(['user_id' => Auth::user()->id, 'disease_id' => $d->first()->id]);
        }
        
        //add user allergen
        if ($request->has('allergen_name')){             
            $allergen = $request->allergen_name; 
            $a = Allergen::where('name', $allergen)->get();
            
            if(count(DB::table('allergens_users')->where([['user_id',Auth::user()->id],['allergen_id', $a->first()->id],])->get()) == 0)
                DB::table('allergens_users')->insert(
                    ['user_id' => Auth::user()->id, 'allergen_id' => $a->first()->id]);
        }
        
        return $this->profil_table();
    }
    
    public function setari(){
        return view('posts.setari');
    }
    
}
