@extends('admin.master')
@section('title','All Projects')
@section('content')

    <h1>All Projects</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Client</th>
                <th>Category</th>
                <th>Image</th>
                <th>Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($projects as $project)
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{  $project->category  }}</td>
                    <td><img width="80" src="{{ asset('image/projects/'.$project->image) }}" alt=""></td>
                    <td>{{  $project->About->title  }}</td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
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
