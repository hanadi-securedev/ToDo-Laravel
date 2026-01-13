@extends('layouts.app')
@section('title', 'Add Todo')
@section('content')
    <h1>Add New Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_completed">
                <input type="checkbox" name="is_completed" id="is_completed" value="1" {{ old('is_completed') ? 'checked' : '' }}>
                Completed
            </label>
        </div>
        
        <button type="submit">Add Todo</button>
        <a href="{{ route('todos.index') }}">Cancel</a>
    </form>
@endsection