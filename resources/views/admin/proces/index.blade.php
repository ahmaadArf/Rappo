@extends('admin.master')
@section('title','All Proces')
@section('content')

    <h1>All Proces</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($proces as $proce)
                    <td>{{ $proce->id }}</td>
                    <td><img width="80" src="{{ asset('image/proces/'.$proce->image) }}" alt=""></td>
                    <td>{{ $proce->title }}</td>
                    <td>{!! $proce->content !!}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.proces.edit', $proce->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.proces.destroy', $proce->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
