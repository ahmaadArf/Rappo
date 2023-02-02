@extends('admin.master')
@section('title','Add Project')

@section('content')

    <h1>Add new Project</h1>
    @include('admin.errors')
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Client</label>
            <input type="text" name="client" placeholder="Client" value="{{ old('client') }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" placeholder="Category" value="{{ old('category') }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Website</label>
            <input type="text" name="website" placeholder="Website" value="{{ old('website') }}"  class="form-control">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

        </div>

        <div class="mb-3">
            <label>Service</label>
            <select name="about_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services as $service )
                <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach

            </select>
        </div>



        <button class="btn btn-success px-5">Add</button>
    </form>

@stop

