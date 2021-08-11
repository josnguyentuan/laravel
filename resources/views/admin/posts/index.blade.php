@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover table-bordered text-center">
                <a href="{{route('post.add')}}" class="mb-2 btn btn-outline-success">Add new post</a>
                <thead class="thead-dark">
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post => $value)
                    <tr>
                        <td >{{$post++}}</td>
                        <td class="bg-dark">
                            <img src="{{asset( 'storage/' . $value->image)}}" width="100" />
                        </td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->categories->name}}</td>
                        <td>
                            <a href="{{route('post.edit', ['id' => $value->id])}}" class="btn btn-info">Edit</a>
                            <a href="{{route('post.delete', ['id' => $value->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $posts->links() !!}

        </div>
    </div>
@endsection
