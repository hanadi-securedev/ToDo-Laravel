@extends('layouts.app')
@section('title', 'All Todos')
@section('content')
    <h1>My Todos</h1>
    <a href="{{ route('todo.create') }}" class="btn">Add New Todo</a>
    <ul class="todo-list">
        @forelse ($todos as $todo)
            <li class="{{ $todo->is_completed ? 'completed' : '' }}">
                <span>{{ $todo->title }}</span>
                <div class="actions">
                    <a href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                    <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li>No todos yet. Create one!</li>
        @endforelse
    </ul>
@endsection