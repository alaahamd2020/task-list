@extends('layouts.app')

{{-- @section('title', 'Edit task') --}}

@section('content')
    {{--  <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $task->title }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea rows="5" name="description" id="description">{{ old('description') ?? $task->description }}</textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Long Description</label>
            <textarea rows="10" name="long_description" id="long_description">{{ old('long_description') ?? $task->long_description }}</textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit task</button>
        </div>
    </form>
 --}}

    @include('form', ['task' => $task])
@endsection
