<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('user')->get();
        return view('post.all-posts',compact('posts'));
    }
    public function addPostWithAjax(PostRequest $request){
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=1;
        $post->save();
        return response()->json($post);
    }
    public function getEditPost(Post $post){
        return response()->json($post);
    }
    
    public function editPostWithAjax(PostRequest $request,Post $post){
        return $request->all();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=1;
        $post->save();
        return response()->json($post);
    }
    public function deletePostWithAjax(Post $post){
        if($post->delete()){
            return response()->json(['message'=>'Post Deleted Successfully']);
        }
    }
    public function deleteSelectedPostsWithAjax(Request $request){
        $allSelectedIDs=$request->allSelectedIDs;
        Post::whereIn('id',$allSelectedIDs)->delete();
        return response()->json(['message'=>'Selected Posts Deleted Successfully']);
        
    }
}
