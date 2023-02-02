@extends('admin.master')
@section('title','All Trashed Projects')
@section('content')

    <h1>All Trashed Projects</h1>
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
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.restore', $project->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.projects.forcedelete', $project->id) }}" method="POST">
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
