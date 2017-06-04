<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'FEEDBACK'; //we store our comments in this tabel
    public $timestamps = false; //our table FEEDBACK doesn't have created_at and updated_at columns as expected
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
