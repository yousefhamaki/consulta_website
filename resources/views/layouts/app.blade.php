<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(Session::has('success'))
        <!-- session show alerts -->
            <div class='alert alert-success'>
                {{Session::get('success')}}
            </div>

        @endif
        @if(Session::has('error'))
            <div class='alert alert-danger'>
                {{Session::get('error')}}
            </div>

        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script>
        function successAlert(text){
            let element = document.createElement('p');
            let alert = `<div class='alert alert-success'>
                            ${text}
                        </div>`;
            element.innerHTML = alert;
            document.body.appendChild(element)
        }
    </script>
    <script src="{{ asset('js/header.js')}}"></script>
    @yield('scripts')
</body>
</html>
