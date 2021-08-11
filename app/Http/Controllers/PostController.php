<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public  function  index(){
        $posts = Post::paginate(5);
        $posts->load('categories');
        return view('admin.posts.index', compact('posts' ));
    }
    public  function  create(){
        $model = Category::all();
        return view('admin.posts.add', compact('model' ))->with('user', Auth::user());
    }

    public  function  store(Request $request){
        $model = new Post();
        $model->fill($request->all());
        if($request->hasFile('fileupload')){
            $newFileName = uniqid(). '-' . $request->fileupload->getClientOriginalName();
            $path = $request->fileupload->storeAs('public/uploads/categories', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('post.index'));
    }

    public  function  edit($id){
        $model = Category::all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('model', 'post' ))->with('user', Auth::user());;
    }

    public  function  update($id, Request $request){
        $model = Post::find($id);
        $model->fill($request->all());
        if($request->hasFile('fileupload')){
            $newFileName = uniqid(). '-' . $request->fileupload->getClientOriginalName();
            $path = $request->fileupload->storeAs('public/uploads/categories', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('post.index'));
    }
    public  function  destroy($id){
        $model = Post::find($id);
        $model->delete();
        return redirect()->back();
    }
}
