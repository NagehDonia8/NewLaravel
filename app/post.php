<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;
class post extends Model
{
    //
     public $directory = "/images/";
    use softdeletes;

    protected $dates = ['deleted_at'];





    protected $fillable = ['title' ,'content' , 'path'];

    public function user(){

        return $this->belongsTo('App\User');

    }
    public function tag(){
        return $this->morphToMany('App\tags' , 'taggable');
    }

    public function getPathAttribute($value){

        return $this->directory . $value;
    }

   
    // public static function scopeLatest($query){

    //     return $query->orderBy('id' , 'asc')->get();

    // }


}
