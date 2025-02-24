@extends('layouts.app')
@section('title', isset($task) ? 'Edit task' : 'Create task')
@section('style')

@endsection
@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea rows="5" name="description" @class(['border-red-500' => $errors->has('description')]) id="description">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea rows="10" name="long_description" @class(['border-red-500' => $errors->has('long_description')]) id="long_description">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="items-center btn" type="submit">{{ isset($task) ? 'Edit task' : 'Add task' }}</button>
        </div>
    </form>
@endsection
