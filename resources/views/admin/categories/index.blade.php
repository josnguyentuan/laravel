@extends('admin.layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <table class="table table-hover table-bordered text-center">
            <a href="{{route('category.add')}}" class="mb-2 btn btn-outline-success">Add new category</a>
            <thead class="thead-dark">
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>

            </thead>
            <tbody>
            @foreach($categories as $cate => $value)
                <tr>
                    <td >{{$cate++}}</td>
                    <td class="bg-dark">
                        <img src="{{asset( 'storage/' . $value->image)}}" width="100" />
                    </td>
                    <td>{{$value->name}}</td>
                    <td>
                        <a href="{{route('category.edit', ['id' => $value->id])}}" class="btn btn-info">Edit</a>
                        <a href="{{route('category.delete', ['id' => $value->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! $categories->links() !!}

    </div>
</div>
@endsection
