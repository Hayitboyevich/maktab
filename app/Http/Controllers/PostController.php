<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Profile;
use App\Post;
use App\Like;
use App\DisLike;
use App\Comment;
use Auth;
use DB;

class PostController extends Controller
{
   public function post()
   {
   	$categories = Category::all();
   	return view('posts.post')->with('categories', $categories);
   }

   public function addpost(Request $request)
   {
	$posts = new Post;
	$posts->post_title =$request->post_title;
	$posts->post_body = $request->post_body;
	$posts->user_id = Auth::user()->id;
	$posts->category_id = $request->category_id;

	if ($request->hasFile('post_image')) {
    		$file = $request->file('post_image');
    		$extension = $file->getClientOriginalExtension();
    		$filename =time().'.'.$extension;
    		$file->move('posts/', $filename);
    		$posts->post_image =$filename;
        }
    	     	   

    	$posts->save();
    	return redirect('post');
	   }

     public function view($id)
     {
      $posts = Post::where('id', '=', $id)->get();
      $likePost = Post::find($id);
      $likeStr = Like::where(['post_id' => $likePost->id])->count();
      $dislikeStr = DisLike::where(['post_id' => $likePost->id])->count();
      $categories = Category::all();
      $comments = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select('users.name', 'comments.*')
            ->where(['post_id'=>$id])
            ->get();
          
      return view('posts.view', ['posts'=>$posts, 'categories'=>$categories, 'likes'=>$likeStr, 'dislike'=>$dislikeStr, 'comments'=>$comments]);
     }

     public function edit($id)
     {
      $categories = Category::all();
      $posts =Post::find($id);
      return view('posts.edit', ['categories'=>$categories, 'posts'=>$posts]);
     }

     public function editpost(Request $request, $id)
     {
      $posts = Post::find($id);
      $posts->post_title =$request->post_title;
      $posts->post_body = $request->post_body;
      $posts->user_id = Auth::user()->id;
      $posts->category_id = $request->category_id;

  if ($request->hasFile('post_image')) {
        $file = $request->file('post_image');
        $extension = $file->getClientOriginalExtension();
        $filename =time().'.'.$extension;
        $file->move('posts/', $filename);
        $posts->post_image =$filename;
        }
               

      $posts->update();
      return redirect('home');

     }

     public function delete($id)
     {
      $post = Post::find($id);
      $post->delete();
      return redirect('home');
     }

     public function category($id)
     {
      $categories = Category::all();
       $posts = DB::table('posts')
        ->join('categories','posts.category_id','=','categories.id')
        ->select('posts.*', 'categories.*')
        ->where('categories.id', $id)
          ->get();
      return view('categories.categoriespost', ['categories'=>$categories, 'posts'=>$posts]);

     }

     public function like($id)
     {
      
      $likeid = Auth::user()->id;
      $like_user = Like::where(['user_id' =>$likeid, 'post_id'=>$id])->first();
      if (empty($like_user->user_id)) {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $post_id = $id;
        $like = New Like;
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->email = $user_email;
        $like->save();
        return redirect("view/{$id}");
      }
      else{
        return redirect("view/{$id}");
      }

    }
    public function dislike($id)
     {
      
      $dislikeid = Auth::user()->id;
      $dislike_user = DisLike::where(['user_id' =>$dislikeid, 'post_id'=>$id])->first();
      if (empty($dislike_user->user_id)) {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $post_id = $id;
        $dislike = New DisLike;
        $dislike->user_id = $user_id;
        $dislike->post_id = $post_id;
        $dislike->email = $user_email;
        $dislike->save();
        return redirect("view/{$id}");
      }
      else{
        return redirect("view/{$id}");
      }

    }

    public function comment(Request $request,$id)
    {
      $comment = new Comment;
      $comment->user_id = Auth::user()->id;
      $comment->post_id = $id;
      $comment->comment = $request->comment;
      $comment->save();
      return redirect("view/{$id}"  );
    }

    public function search(Request $request)
    {
      $user_id = Auth::user()->id;
      $profile = Profile::find($user_id);
      $keyword = $request->input('search');
      $posts = Post::where('post_title', 'Like', '%'.$keyword.'%')->get();
      return view('posts.search', ['profile'=>$profile, 'posts'=>$posts]);
    }
}
