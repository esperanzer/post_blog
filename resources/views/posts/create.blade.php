@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>Create Post</h1>
{{-- //(session('success')) reads the flash message from the controller  --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" name="body" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-primary">Save Post</button>
        </div>
    </form>
</div>
@endsection