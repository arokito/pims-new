@extends('layouts.guest')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-transparent sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class=" navbar navbar-expand-sm top-0 right-0 px-6 py-4 sm:block float-right ">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
             
                

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endif
        </div>
    @endif

   
</div>

    
@endsection
        
