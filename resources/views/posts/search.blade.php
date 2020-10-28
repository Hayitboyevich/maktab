@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius: 100%;
        max-width: 100px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                           @if(!empty($profile))
                            <p class="lead">{{$profile->name}}</p>
                            @else
                            <p></p>
                            @endif</div>
                        <div class="col-md-8">
                            <form action="/search" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for....">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn default">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
 
                        </div>
                    </div>
                    
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        
                        @if(!empty($profile))
                        <img src="uploads/{{$profile->profile_pic}}" class="avatar">
                        @else
                        <img src="uploads/avatar.png" class="avatar">
                        @endif
                       
                        @if(!empty($profile))
                        <p class="lead">{{$profile->designation}}</p>
                        @else
                        <p></p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        @foreach($posts as $post)
                            <h4 class="text-center">{{$post->post_title}}</h4>
                            <img src="posts/{{$post->post_image}}" style="width:400px; height:400px">
                            <p>{{$post->post_body}}</p>
                            <nav class="nav">
                                 <a class="nav-link active" href="/view/{{$post->id}}">View</a>
                                 @if(Auth::user()->id == $post->user_id)
                                 <a class="nav-link" href="/edit/{{$post->id}}">Edit</a>
                                 @else

                                 @endif
                                  @if(Auth::user()->id == $post->user_id)
                                 <a class="nav-link" href="/delete/{{$post->id}}">Delete</a>
                                 @else

                                 @endif
                                    
                            </nav>
                            <cite style="float:left;">Posted on: {{date('M j, Y H:i', strtotime($post->update_at))}}</cite>
                            <hr>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
