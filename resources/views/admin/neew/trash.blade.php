@extends('admin.master')
@section('title','All Trashed Neews')
@section('content')

    <h1>All Trashed Neews</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($neews as $neew)
                <td>{{ $neew->id }}</td>
                <td>{{ $neew->title }}</td>
                <td>{!! $neew->content !!}</td>
                <td>{{ $neew->date }}</td>
                <td><img width="80" src="{{ asset('image/neews/'.$neew->image) }}" alt=""></td>
                <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.neews.restore', $neew->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.neews.forcedelete', $neew->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
