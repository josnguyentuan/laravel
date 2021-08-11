@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="name" value="{{old('name'),$model->name}}" class="form-control" placeholder="Enter category name ...">
            </div>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <img src="{{asset( 'storage/' . $model->image)}}" width="100" />
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file"  name="fileupload" class="form-control" >
            </div>
            @error('fileupload')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="d-flex ">
                <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary w-25 ml-2">Submit</button>
            </div>
        </form>
    </div>
@endsection
