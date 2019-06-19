<!DOCTYPE html>
<html>
<head>
	<title>document</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
 	<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
 		@csrf
 		<div class="form-group">
 			<label for="title">Title</label>
 			<input type="text" name="title" id="title" class="form-control">
 		</div>
 		<div class="form-group">
 			<label for="content">Content</label>
 			<textarea name="content" id="content" rows="10" cols="30" class="form-control" ></textarea>
 		</div>
 		<div class="form-group">
 			<input type="submit" value="Create posts">
 		</div>
 	</form>
 </div>
</body>
</html>