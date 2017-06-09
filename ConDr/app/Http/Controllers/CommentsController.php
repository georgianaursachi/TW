<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use Auth;




class CommentsController extends Controller
{
    public function addComment($product_name){
        $product = Product::where('product_name', $product_name)->get();     
        
        Comment::create([
            'user_id'=> Auth::user()->id,
            'product_id'=> $product->first()->id,
            'message' => request('comentariu')
        ]
        );
        
        return back();
    }
}
