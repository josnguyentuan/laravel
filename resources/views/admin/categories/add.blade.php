@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter category name ...">
            </div>
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                <input type="file"  name="fileupload" class="form-control" >
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-25 ">Submit</button>
            </div>
        </form>
    </div>
@endsection
