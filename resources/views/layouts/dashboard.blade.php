<!DOCTYPE html>
<html lang="en">

<head> 
    @include('partials._head')
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>

        @include('partials.dashboard._nav')

        @include('partials.dashboard._sidenav')
    
        <main class="content">

            @include('partials.dashboard._topbar')
            {{-- @include('partials.dashboard._topbar-buttons') --}}

            @yield('content')
            
            @include('partials._footer')
        </main>

    @include('partials._scripts')
    
</body>

</html>
