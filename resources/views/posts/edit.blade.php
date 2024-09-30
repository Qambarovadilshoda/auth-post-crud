@extends('layouts.app')
@section('title', 'Edit Post')

@section('content')
<div class="container mt-4">
    <h2>Edit Post</h2>
    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="context" rows="6"
                required>{{$post->context}}</textarea>
        </div>
        <div class="mb-3">
            <label for="current-image" class="form-label">Current Image</label>
            <img src="{{ asset('storage/' . $post->image) }}" width="100" alt="Current post image" class="img-fluid mb-2">
            <input type="file" class="form-control" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection