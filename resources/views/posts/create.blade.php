@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="container mt-4">
    <h2>Create New Post</h2>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" name="title" required>
        </div>
        @error('title')
        <p class="help-blok text-danger">{{' * ' . $message}}</p>
        @enderror
        <div class="mb-3">
            <label for="context" class="form-label">Content</label>
            <textarea class="form-control" name="context" rows="6" required>{{old('context')}}</textarea>
        </div>
        @error('context')
        <p class="help-blok text-danger">{{' * ' . $message}}</p>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}" accept="image/*" required>
        </div>
        @error('image')
        <p class="help-blok text-danger">{{' * ' . $message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection