<!DOCTYPE html>
<html>
<head>
	<title>document</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
 	<form action="{{route('posts.update', $post->id)}}" method="post">
 		
 		@csrf
 		@method('put')
 		<div class="form-group">
 			<label for="title">Title</label>
 			<input type="text" name="title" id="title" class="form-control" value="{{old('title', $post->title)}}">
 		</div>
 		<div class="form-group">
 			<label for="content">Content</label>
 			<textarea name="content" id="content" rows="10" cols="30" class="form-control" >{{old('content', $post->content)}}</textarea>
 		</div>
 		<div class="form-group">
 			<input type="submit" value="Edit posts">
 		</div>
 	</form>
 </div>
</body>
</html>