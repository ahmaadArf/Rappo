@extends('admin.master')
@section('title','Add About')

@section('content')

    <h1>Add new About</h1>
    @include('admin.errors')
    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" value="{{ old('icon') }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}"  placeholder="Title" class="form-control">
        </div>


        <div class="mb-3">
            <label>Content</label>
            <textarea class="myedit" placeholder="Content" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="about">About</option>
                <option value="service1">Service1</option>
                <option value="service2">Service2</option>
            </select>
        </div>
        <button class="btn btn-success px-5">Add</button>
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
