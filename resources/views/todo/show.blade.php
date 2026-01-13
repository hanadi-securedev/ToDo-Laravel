@extends('layouts.app')
@section('content')
    <h1>Show Todo</h1>
    <form action="{{ route('todo.show', $todo->id) }}" method="Get">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
         <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" readonly>
        
        </div>
        <a href="{{ route('todos.index') }}">Back</a>


    </form>
@endsection