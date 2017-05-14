<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestController extends Controller{
    
    public function test(){
        $users=DB::select('select * from enumber');
       
        return view('welcome',compact('enr'));
    }
    
}
