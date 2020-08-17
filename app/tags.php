<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    //
    public function post(){
        return $this->morphedByMany('App\post' , 'taggable');
    }
    public function video(){
        return $this->morphedByMany('App\video' , 'taggable');
    }
}
