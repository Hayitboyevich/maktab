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
