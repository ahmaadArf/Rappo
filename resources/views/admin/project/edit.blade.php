@extends('admin.master')
@section('title','Edit Project')

@section('content')

    <h1>Edit Project</h1>
    @include('admin.errors')
    <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $project->name }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Client</label>
            <input type="text" name="client" placeholder="Client" value="{{ $project->client }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" placeholder="Category" value="{{ $project->category }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Website</label>
            <input type="text" name="website" placeholder="Website" value="{{ $project->website }}"  class="form-control">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/projects/'.$project->image) }}" alt="">

        </div>

        <div class="mb-3">
            <label>Service</label>
            <select name="about_id" class="form-control">
                @foreach ($services as $service )
                <option value="{{ $service->id }}" {{$service->id == $project->about_id ?'selected':''  }}>{{ $service->title }}</option>
                @endforeach

            </select>
        </div>
        <button class="btn btn-success px-5">Update</button>
    </form>

@stop


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
tinymce.init({
    selector: '.myedit'
})
</script>

@stop
