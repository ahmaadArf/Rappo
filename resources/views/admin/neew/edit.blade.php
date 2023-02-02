@extends('admin.master')
@section('title','Edit Neews')

@section('content')

    <h1>Edit Neews</h1>
    @include('admin.errors')
    <form action="{{ route('admin.neews.update',$neew->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="{{ $neew->title }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ $neew->date }}"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/neews/'.$neew->image) }}" alt="">

        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea class="myedit" placeholder="Content" name="content">{{ $neew->content }}</textarea>
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
