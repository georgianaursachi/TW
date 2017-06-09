<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'FEEDBACK'; //we store our comments in this tabel
    protected $fillable = ['id', 'user_id', 'product_id', 'rating', 'message', 'created_at', 'updated_at']; //these are the columns of the table
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
