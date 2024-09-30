@extends('layouts.app')


@section('title', 'All Posts')

@section('content')

<div class="container mt-4">
    <h2>Recent Posts</h2>
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card mb-4">

                <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="Image for Example Post Title 1">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->context}}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read More</a>
                    @if (Auth::check())
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary ms-2">Edit</a>
                    <form action="{{route('posts.destroy', $post->id)}}" style="display:inline" ; method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    {{$post->user->name}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <p class="card-text">This is a simple blog website created using HTML, CSS, and Bootstrap. It
                        features posts with titles, descriptions, and images.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection