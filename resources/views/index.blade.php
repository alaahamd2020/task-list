@extends('layouts.app')
@section('title', 'Tasks list')

@section('content')
    <h2>
        The task count is: {{ count($alltasks) }}<br>
        The completed task is: {{ $alltasks->where('completed')->count() }}
    </h2>
    <nav class="mb-5" style="width: 100%; display: flex;">
        <a class="font-medium text-gray-700 underline decoration-pink-500" style="font-size: xx-large; margin: auto"
            href="{{ route('tasks.create') }}">
            Create
            Task </a>
    </nav>
    <div>
        <ul>
            @forelse($tasks as $task)
                <div>
                    <li>
                        <a href="{{ route('tasks.show', $task->id) }}" @class(['line-through text-gray-500' => $task->completed])>{{ $task->title }}</a>
                    </li>
                </div>
            @empty
                <div>No tasks found</div>
            @endforelse
        </ul>
    </div>
    <nav>
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </nav>
@endsection
