@extends('layouts.app')
@section('content')
    <h1>Edit Todo</h1>
    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $todo->title) }}">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_completed" {{ $todo->is_completed ? 'checked' : '' }}>
                Completed
            </label>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection