<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =DB::table('posts')->orderBy('created_at', 'DESC')->get();
        return View('welcome')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:100',
            'content' => 'required|string|min:5|max:500',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        
        if($request->hasFile('image')){
            $post = new Post();

            $img = time()."_".$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('uploads'), $img);

            $post->title = $request->title;
            $post->content = $request->content;
            $post->image = $img;
            $post->user_id = $request->user_id;

            if($post->save()){
                return back()
                ->with('success','Post has been created!');
               
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $post =DB::table('posts')->where('id', $id)->get();
        $post = Post::find($id);
        return View('pages.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return View('pages.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required|string|min:3|max:100',
            'content' => 'required|string|min:5|max:500',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        if($request->hasFile('image')){
            $post = Post::find($id);

            $img = time()."_".$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('uploads'), $img);

            $post->title = $request->title;
            $post->content = $request->content;
            $post->image = $img;


            if($post->save()){
                return back()
                ->with('success','Post has been updated!');
               
            }

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::Find($id);
        
        if($post->delete()){
            return View('home')
            ->with('success','Post has been updated!');
           
        }
    
    }
}
