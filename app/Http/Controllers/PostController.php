<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('user')->get();
        return view('post.all-posts',compact('posts'));
    }
    public function addPostWithAjax(Request $request){
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=1;
        $post->save();
        return response()->json($post);
    }
    public function getEditPost($id){
        $post=Post::findOrFail($id);
        return response()->json($post);
    }
    
    public function editPostWithAjax(Request $request,$id){
        $post=Post::findOrFail($id);
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=1;
        $post->save();
        return response()->json($post);
    }
    public function deletePostWithAjax($id){
        $post=Post::findOrFail($id);
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
