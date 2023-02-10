@extends('admin.master')
@section('title','All About')
@section('content')

    <h1>All Abouts</h1>
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
                        @can('about-edit')
                        <a class="btn btn-primary" href="{{ route('admin.abouts.edit', $about->id) }}"><i class="fas fa-edit"></i></a>

                        @endcan
                        @can('about-delete')
                        <form class="d-inline" action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $abouts->appends($_GET)->links() }}

@stop
