<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryFormRequest;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
    public function  create(){
        return view('admin.categories.add');
    }

    public function  store(CategoryFormRequest $request){
        $model = new Category();
        $model->fill($request->all());
        if($request->hasFile('fileupload')){
            $newFileName = uniqid(). '-' . $request->fileupload->getClientOriginalName();
            $path = $request->fileupload->storeAs('public/uploads/categories', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('category.index'));
    }
    public  function  destroy($id){
        $model = Category::find($id);
        Post::where('cate_id', $id)->delete();
        $model->delete();
        return redirect()->back();
    }
    public  function  edit($id){
        $model = Category::find($id);
        return view('admin.categories.edit', compact('model'));
    }
    public  function  update($id, CategoryFormRequest $request){
        $model =  Category::find($id);
        $model->fill($request->all());
        if($request->hasFile('fileupload')){
            $newFileName = uniqid(). '-' . $request->fileupload->getClientOriginalName();
            $path = $request->fileupload->storeAs('public/uploads/categories', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('category.index'));
    }
}
