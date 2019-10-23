<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/nav_bar.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        @yield('style')
        @yield('head_script')
    </head>
    <body>
        @if (Route::has('login'))
        <div class="nav_bar">
            <div class="nav_attr logo right_1">Mr System</div>
            @auth
            <a class="nav_attr about_us left_4" href="{{url('/about_us')}}">About Us</a>
            <a class="nav_attr contact_us left_3" href="{{url('/contact_us')}}">Contact Us</a>
            <a class="nav_attr my_system left_2" href="{{url('/my_system')}}">My System</a>
            <a class="nav_attr home left_1" href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        @yield('body')
    </body>
    @yield('script')
</html>

