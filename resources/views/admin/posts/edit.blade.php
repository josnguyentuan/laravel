@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Post Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Enter title ...">
            </div>
            <div class="form-group">
                <label><strong>Description :</strong></label>
                <textarea class="ckeditor form-control"  name="short_description">
                    {{$post->short_description}}
                </textarea>
            </div>

            <div class="form-group" >
                <label for="">Category</label>
                <select name="cate_id" id="" class="form-select">
                    @foreach($model as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <img src="{{asset( 'storage/' . $post->image)}}" width="30%" height="30%" />
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file"  name="fileupload" class="form-control" >
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-25 ">Submit</button>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
