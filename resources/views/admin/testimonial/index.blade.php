@extends('admin.master')
@section('title','All Testimonials')
@section('content')

    <h1>All Testimonial</h1>
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
                <th>Job</th>
                <th>Image</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($testimonials as $testimonial)
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->job }}</td>
                    <td><img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt=""></td>
                    <td>{!! $testimonial->comment !!}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.testimonials.edit', $testimonial->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
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
