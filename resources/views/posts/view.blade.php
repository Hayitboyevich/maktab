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
                    <p class="lead"></p>        
                </div>


                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                       <ul class="list-group">
                           @foreach($categories as $category)
                           <li class="list-group-item">
                               <a href="/category/{{$category->id}}">{{$category->category}}</a>
                           </li>
                           @endforeach
                       </ul>
                    </div>
                    <div class="col-md-8">
                         @foreach($posts as $post)
                            <h4 class="text-center">{{$post->post_title}}</h4>
                            <img  src="/posts/{{$post->post_image}}" style="width:300px; height:300px">
                            <p>{{$post->post_body}}</p>
                            <nav class="nav">
                                 <a class="nav-link active" href="/like/{{$post->id}}">Like({{$likes}})</a>
                                 <a class="nav-link" href="/dislike/{{$post->id}}">Dislike({{$dislike}})</a>
                                    <a class="nav-link" href="/comment/{{$post->id}}">Comment</a>
                            </nav>
                        @endforeach

                        <form action="/comment/{{$post->id}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" id="comment" rows="6">                                        
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Post Comment</button>
                                </div>
                            </form>

                            <h3>Comments</h3>
                            @foreach($comments as $comment)
                                <p>Posted by: {{$comment->name}}</p>
                                <p>{{$comment->comment}}</p>
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
