<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestController extends Controller{
  
      		      
      public function test(){		     
       $enr=DB::select('select name from enumber');		 
         		         
       return view('posts.welcome',compact('enr'));		 
      }		      
      		      
  }

