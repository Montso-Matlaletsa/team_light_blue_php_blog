@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$post->title}}</h3>
    <hr />

    <div class="row">
        <div class="col m4">
            <img src={{ asset("uploads/$post->image") }} alt="" 
            width="100%" height="300px" />
         
        </div>

        <div class="col m8">
            <p style="font-size: 20px" >{{$post->content}}</p>
        </div>

        <p class="col m12">
           @auth
                @if(Auth::user()->id == $post->user_id)
                    <a class="btn left" href="/edit/{{$post->id}}">Edit Post</a> 

                    <a class="btn right orange" href="/delete/{{$post->id}}">Delete Post</a> 
                @endif
           @endauth 

        </p>
    </div>
</div>
    
@endsection