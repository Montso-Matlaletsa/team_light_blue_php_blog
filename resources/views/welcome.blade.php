@extends('layouts.app')

@section('content')

<h4 class="center">Todays posts</h4>
<hr />
    <div class="container row">
        @foreach($posts as $post)  
        <div class="col s12 m3">
            <a href="/show/{{$post->id}}"  class="music_poster" >
                <img src={{ asset("uploads/$post->image") }} alt="" 
                 width="100%" style="min-height: 250px" 
                />
            </a>

            <h5 class="center">{{$post->title}}</h5>
        </div>
    @endforeach
    </div>
@endsection