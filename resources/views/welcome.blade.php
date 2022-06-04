@extends('layouts.guest')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-transparent sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class=" navbar navbar-expand-sm top-0 right-0 px-6 py-4 sm:block float-right ">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <div class="p-2">
                @include('auth.login')

            </div>
             
                

                @if (Route::has('register'))
                   @include('auth.register')
                @endif
            @endif
        </div>
    @endif

   
</div>

    
@endsection
        
