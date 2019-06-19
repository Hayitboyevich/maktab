<!DOCTYPE html>
<html>
<head>
	<title>document</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
 <div class="conteiner">
 	<div class="card">
 		<div class="card-header">
 			<h2>{{$post->title}}</h2>
 		</div>
 		<div class="card-body">
 			<p>
 				{{$post->content}}
 			</p>
 		</div>
 	</div>
 </div>
</body>
</html>