<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>@yield('title')</title>
    <!-- fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="{{ asset('bootstrap/bootstrap.css') }}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      #sidebarMenu{
          overflow: scroll;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{url( MANAGE . '/dashboard')}}">
        <img src="{{ asset('data/logo.png') }}" style="width: 100%; max-width: 150px;" alt="">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="{{ route('logout') }}"
            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                {{ __('Sign out') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
    </div>
    </header>
    <div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link valid" aria-current="page" href="{{url( MANAGE . '/dashboard')}}">
                    <span data-feather="home"></span>
                    Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/menu')}}">
                    <span data-feather="file"></span>
                    Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/partitions')}}">
                    <span data-feather="file"></span>
                    Partitions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/orders')}}">
                    <span data-feather="file"></span>
                    الطلبات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/offers')}}">
                    <span data-feather="shopping-cart"></span>
                    العروض
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/users')}}">
                    <span data-feather="users"></span>
                    المستخدمين
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/reports')}}">
                    <span data-feather="bar-chart-2"></span>
                    الإبلاغات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/posts')}}">
                    <span data-feather="layers"></span>
                    المنشورات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/law')}}">
                    <span data-feather="layers"></span>
                    القوانين المصرية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link valid" href="{{url( MANAGE . '/admin')}}">
                    <span data-feather="layers"></span>
                    طاقم العمل
                    </a>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
            </h6>
            <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                تقرير عام
                </a>
            </li>
            </ul>
        </div>
        </nav>

        @if(Session::has('success'))
        <!-- session show alerts -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                    {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                    {{Session::get('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2" style='color: #2470dc;'>@yield('title')</h1>
                @yield('options')
            </div>
            @yield('content')
        </main>
    </div>
    </div>

    
    <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/dashboard.js')}}"></script>
    @yield('scripts')
</body>
</html>