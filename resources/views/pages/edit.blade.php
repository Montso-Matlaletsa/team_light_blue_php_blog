@extends('layouts.app')

@section('content')
<div class="row container">
    <h4 class="center">Edit Blog Post</h4>

    @if ($message = Session::get('success'))
    <div class="isa_success">
      <i class="fa fa-check"></i>
        Blog Edited Successfully
  </div>
  @endif
  
  @if (count($errors) > 0)
  <div class="isa_error">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

    <div class="col m8"></div>
    <div class="card col m8 s12" style="margin-bottom: 40px;">
        <div class="card-content center">
            <form method="POST" action="/update/{{$post->id}}" enctype="multipart/form-data">
                @csrf

                <div class="input-field">
                    <input id="title" type="text" class="@error('title') is-invalid @enderror" value="{{$post->title}}" name="title"  required  autofocus>
                    <label for="title">{{ __('Title') }}</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea1" name="content" class="materialize-textarea">{{$post->content}}</textarea>
                    <label for="textarea1">Add Content</label>
                </div>


                <div class="file-field input-field" style="margin-top: 50px ">
                    <div class="btn">
                      <span>Blog Image</span>
                      <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                 

                <button type="submit" class="btn col s12 purple" style="margin-bottom: 50px">
                    {{ __('Add Blog') }}
                </button>

            </form>
        </div>

      </div>

</div>
@endsection