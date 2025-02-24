@extends('layouts.app')
@section('content')
    @include('form')
@endsection


{{-- old verison --}}
{{-- @section('title', 'Create task')
    @section('style')

    @endsection
    @section('content')
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea rows="5" name="description" id="description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="long_description">Long Description</label>
                <textarea rows="10" name="long_description" id="long_description">{{ old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Add task</button>
        </form>
    @endsection
    --}}
