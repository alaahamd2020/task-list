@extends('layouts.app')
@section('title', $task->title)
@section('content')

    <h2 class="mb-4 text-slate-700">{{ $task->description }}</h2>
    <h3 class="mb-4 text-slate-700">{{ $task->long_description }}</h3>
    <p @class([
        'font-medium',
        'text-green-500' => $task->completed,
        'text-red-500' => !$task->completed,
    ])>{{ $task->completed ? 'Completed' : 'Not completed' }}</p>
    <p class="mb-5 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} .
        Updated {{ $task->updated_at->diffForHumans() }}</p>

    <br><br>
    <div class="flex items-center gap-2">
        <form method="POST" action="{{ route('tasks.complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button class="btn"
                type="submit">{{ $task->completed ? 'Mark as not completed' : 'Mark as completed' }}</button>
        </form>

        <a class="btn" onclick="window.location.href = '{{ route('tasks.edit', $task->id) }}'">Edit</a>

        <form method="POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
@endsection
