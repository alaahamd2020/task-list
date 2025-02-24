<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @yield('style')
    <style>
        .error_message {
            color: red;
            font-size: small;
        }

        .home {
            margin: auto;

        }
    </style>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply px-2 py-1 font-medium text-center rounded-md shadow-sm text-slate-700  ring-1 ring-slate-700/10 hover:bg-slate-50 cursor-pointer
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500 hover:cursor-pointer
        }

        label{
            @apply block uppercase text-slate-700 mb-2 font-medium mt-5
        }

        input,textarea{
            @apply appearance-none shadow-sm border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>

<body class="container max-w-lg mx-auto mt-10 mb-10">


    <div>
        @if (!(Route::currentRouteName() == 'tasks.index'))
            <a class="link" href="{{ route('tasks.index') }}">🔙 Go to Back</a>
        @endif
    </div>

    @if (session('success'))
        <div x-data="{ flash: true }">
            <div role="alert" x-show="flash"
                class="relative px-4 py-3 mt-5 mb-5 text-lg text-green-700 bg-green-100 border border-green-400 rounded">
                <strong class="font-bold">Success!</strong><br>
                {{ session('success') }}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click=" flash = false" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
    @endif

    <h1 class="mb-3 text-4xl text-justify">@yield('title')</h1>
    <div>
        @yield('content')
    </div>


</html>
