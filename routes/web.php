<?php

use App\country;
use App\post;
use App\User;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');

});


 


Route::group(['middleware'=>'web'],function(){

  Route::resource('/posts' , 'Postscontroller');

Route::get('/dates' , function(){

$date = new DateTime('+1 week');
echo $date->format('m-d-y');
echo '<br>';
echo Carbon::now();
echo '<br>';
echo Carbon::now()->diffForHumans();
echo '<br>';
echo Carbon::now() ->subMonths()->diffForHumans();
echo '<br>';
echo Carbon::now() ->yesterday()->diffForHumans();
echo '<br>';
echo Carbon::now()->addDay()->diffForHumans();
});


Route::get('/getname', function(){

$user = User::find(1);
echo $user->name;


});

Route::get('/setname', function(){

  $user = User::find(1);
   $user->name = "gogo";
   $user->save();
  
  
  });
  






});





//------------------------------------------
              //    database raw queries
//-------------------------------------------

//------------------------------------------------
//Route::get('/insert' , function(){
//
//    DB::insert('insert into posts(title , content) values(?,?) ', ['laravel title is reading' , 'laravel is a best framework between other frameworks']);
//
//});
//-------------------------------------------------------


//Route::get('/read' , function(){
//
//
//   $result= DB::select('select * from posts where id = ?' , [1]);
//   foreach ($result as $post){
//       return $post->title;
//
//   }
//
//
//});

//Route::get('/update' , function(){
//
//  $updated= DB::update('update posts set title = "title updated"  where id = ?' , [1]);
//  return $updated;
//
//});


//Route::get('/delete' , function(){
//
//
//    $deleted = DB::delete('delete from posts where id = ?' ,[1]);
//
//    return $deleted;
//
//
//});


//----------------------------------------
//                ELOQueNT
//-------------------------------
//Route::get('/find' , function(){
//
//    $findpost = post::find(2);
//    return $findpost->title;
//
//
//
//
//});

//-----------------------------------------------

//Route::get('/findwhere' , function(){
//
//    $find = post::where('id' , 3)->orderby('id' ,'desc' )->take(2)->get() ;
//
//
//    return $find;
//
//
//});
 //------------------------------------

//Route::get('/findmore' , function(){
//
//
//    $find = post::where('user_cont' , '>' , 52)->firstorfail();
//    return $find;
//
//
//});


//Route::get('/savedata' , function (){
//
//    $savedata = new post;
//    $savedata->title= 'nageh title ';
//    $savedata->content= 'content content content';
//    $savedata->save();
//
//
//
//
//});



//Route::get('/savedata2' , function (){
//
//    $savedata =  post::find(2);
//    $savedata->title= 'nageh title ';
//    $savedata->content= 'content content content';
//    $savedata->save();
//
//
//
//
//});
   //    insert in  Elquent


//Route::get('/create' ,  function (){
//
//    $postcreate = post::create(['title'=>'gogo php' , 'content'=> 'gogo content  very good person']);
//
//    return $postcreate;
//
//
//});


//    update in ELQUENT
//-------------------------


//Route::get('/update' , function (){
//
//    post::where('id' , 2)->where('is_admin' , 0)->update(['title'=>'gohaaaaaaaa' , 'content'=>'goha contentgoha contentgoha contentgoha content']);
//
//
//
//});



//Route::get('/delete' , function (){
//
//    $post = post::find(2);
//    $post->delete();
//    //post::destroy(2);
//    //post::destroy([4,5]);
//
//
//});
       //  soft delete  with date

//Route::get('/softdelete' , function (){
//
//      post::find(6)->delete();
//
//
//});


//Route::get('/restore' ,  function (){
//
//    post::withTrashed()->where('is_admin',0 )->restore();
//
//
//
//});

   // one to one relation

//use App\User;
//Route::get('/user/{id}/post' , function ($id){
//
//   return User::find($id)->post;
//
//});
//
//Route::get('/post/{id}/user' , function ($id){
//
//   return post::find($id)->user;
//
//});

//-------------------------
   // one to many


//Route::get('/posts' , function (){
//
//   $user = User::find(1);
//   foreach($user->posts  as $post){
//
//       echo $post->title . '<br>';
//
//   }
//
//});

  // many to many


//Route::get('/user/{id}/role' , function ($id){
//
//
//
//    $user = User::find($id);
//
//    foreach ($user->roles as $role){
//
//
//        return $role->name;
//
//    }
//
//
//
//});

  // accssing the intermediate table pivot

//Route::get('user/pivot' , function (){
//
//
//
//    $user = User::find(1);
//
//    foreach ($user->roles as $role){
//
//
//        return $role->pivot->created_at;
//
//    }
//
//
//
//});

      // has many through

//  Route::get('/user/country' , function (){
//
//
//      $country = country::find(1);
//      foreach ($country->posts  as $post){
//
//          return $post->title;
//
//
//      }
//
//  });


  // polymorphism   relation


//Route::get('user/photo' , function (){
//
//  $user = User::find(1);
//  foreach ($user->photo as $photo){
//
//      return $photo->path;
//
//
//  }
//
//});










































//--------------------------------------
//--------------------------------------
//Route::get('/about' , function (){
  //  return " Hi About Page";
//});
//Route::get('/contact' , function (){
 //   return " Hi Iam Contact";
//});

//Route::get('/posts/{id}' , function($id){
  //  return "this is post number".$id;

//});

//Route::get('admin/posts/Example' ,  array(  'as'=>'admin.home'   , function(){

  //  $url = route('admin.home');
  //  return "this is url is" . $url;

//}));



//Route::get('/contact', 'PostsController@contact');
//Route::get('post/{id}' , 'PostsController@show_post');
