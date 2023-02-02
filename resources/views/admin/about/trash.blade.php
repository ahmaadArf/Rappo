@extends('admin.master')
@section('title','All Trashed About')
@section('content')

    <h1>All Trashed Abouts</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Content</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($abouts as $about)
                    <td>{{ $about->id }}</td>
                    <td>{{ $about->icon }}</td>
                    <td>{{ $about->title }}</td>
                    <td>{!! $about->content !!}</td>
                    <td>{{ $about->type }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.abouts.restore', $about->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.abouts.forcedelete', $about->id) }}" method="POST">
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
