<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $posts = post::all();

        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //

           $input = $request->all();
           if($file = $request->file('path')){
               $name = $file->getClientOriginalName();
               $file->move('images' , $name);
               $input['path'] = $name;



           }
            Post::create($input);







        // $this->validate($request,[

        //     'title'=>'required',
        //     'content'=>'required'



        // ]);

        // create


        //   files or images

        //  $file = $request->file('file');
        //  echo "<br>";
        // echo $file->getClientOriginalName();
        //  echo "<br>";
        // echo  $file->getClientSize();

//------------------------------------


         
        post::create($request->all());
       return redirect('/posts');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        $post = post::findorfail($id);
        return view('posts.show' , compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = post::findorfail($id);
        return view('posts.edit' , compact('post'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $post = post::findorfail($id);

       $post->update($request->all());
       return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     $post = post::whereid($id)->delete();
     return redirect('/posts');


    }


    public function contact(){
        $people = ['nageh' , 'alaa' , 'arafa' , 'ahmed' ,'mohamed'];
        return view('contact' , compact('people'));
    }
    public function show_post($id){
         //return view('post')->with('id' , $id);
        return view('post' , compact('id'));
    }
}
