<?php 
$options = [
  ["name" => "Menu",
    "show" => [ ["link" => "menu", "name" => "Menu"], 
                ["link" => "menu/fork", "name" => "Menu fork"], 
                ["link" => "menu/forks/fork", "name" => "Menu forks fork"], 
                ["link" => "menu/forks/forks/fork", "name" => "Menu forks forks fork"],],
    "logo" => "bi bi-menu-down",
    "edit" => [ ["link" => "menu/add", "name" => "Menu"], 
                ["link" => "menu/add/fork", "name" => "Menu fork"], 
                ["link" => "menu/add/forks/fork", "name" => "Menu forks fork"], 
                ["link" => "menu/add/forks/forks/fork", "name" => "Menu forks forks fork"],],
  ], 
  ["name" => "Partitions",
    "show" => [ ["link" => "partitions", "name" => "Partition"] ],

    "edit" => [ ["link" => "partitions/add", "name" => "Partition"] ],
    "logo" => "bi bi-grid-3x3-gap"
  ], 
  ["name" => "consulta_options",
    "show" => [ ["link" => "consulta_options", "name" => "Partition"] ],

    "edit" => [ ["link" => "consulta_options/add", "name" => "Partition"] ],
    "logo" => "bi bi-grid-3x3-gap"
  ],
  ["name" => "Orders",
    "show" => [ ["link" => "orders", "name" => "Orders"], ],
    "logo" => "bi bi-credit-card-fill"
  ], 
  ["name" => "Offers",
    "show" => [ ["link" => "offers", "name" => "Offers"], ],
    "logo" => "bi bi-bar-chart-line-fill",
    "edit" => [ ["link" => "offers/add", "name" => "Offer"], ],
  ], 
  ["name" => "Users",
    "show" => [ ["link" => "users", "name" => "Users"], ],
    "logo" => "ri-group-fill",
    "edit" => [ ["link" => "add/user", "name" => "Users"], ],
  ], 
  ["name" => "Reports",
  "show" => [ ["link" => "reports", "name" => "Reports"], ],
  "logo" => "ri-book-read-fill",
  ],
  ["name" => "Posts",
  "show" => [ ["link" => "posts", "name" => "Posts"], ],
  "edit" => [ ["link" => "posts/add", "name" => "Posts"], ],
  "logo" => "ri-clipboard-fill",
  ],
  ["name" => "Law",
    "show" => [ ["link" => "law", "name" => "Law"], ],
    "edit" => [ ["link" => "law/add", "name" => "Law"], ],
    "logo" => "ri-scales-3-fill",
  ],
  ["name" => "Admin",
    "show" => [ ["link" => "admin", "name" => "Admin"], ],
    "edit" => [ ["link" => "admin/add", "name" => "Admin"], ],
    "logo" => "ri-admin-fill",
  ],
];
use App\Models\NotificationA;

$notifications = NotificationA::orderBy('created_at', 'DESC')->limit(4)->get();
$notification_number = NotificationA::select('id')->where("status", "=", 0)->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('data/logo2.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('team/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('team/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{ asset('team/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url(MANAGE . '/dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ url('data/logo2.png') }}" alt="">
        <span class="d-none d-lg-block">Consulta</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">{{ count($notification_number) }}</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have {{ count($notification_number) }} new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
          @foreach($notifications as $d)
            <li class="notification-item">
              @if($d->type == 0)
              <i class="bi bi-check-circle-fill text-success"></i>
              <div>
              <h4>Verified</h4>
              @elseif($d->type == 1)
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
              <h4>Stop</h4>
              @elseif($d->type == 2)
              <i class="bi bi-exclamation-circle text-danger"></i>
              <div>
              <h4>Remove</h4>
              @elseif($d->type == 3)
              <i class="bi bi-check-circle-fill text-success"></i>
              <div>
              <h4>Add new one in consulta team</h4>
              @endif
              <div>
                <p>{{ $d->notification }}</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
          @endforeach
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ url('data/profile/images/' . Auth::guard('admin')->user()->img) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('admin')->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::guard('admin')->user()->name }}</h6>
              <span>{{ Auth::guard('admin')->user()->job_title }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url(MANAGE . '/profile/' . Auth::guard('admin')->user()->id ) }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile/settings') }}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/help') }}">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url(MANAGE . '/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Options</li>
      @foreach($options as $data)
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#-nav" data-bs-toggle="collapse" href="#">
          <i class="{{ $data['logo'] }}"></i><span>{{ $data["name"] }}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-heading">show</li>
          @foreach($data['show'] as $show)
          <li>
            <a href="{{ url(MANAGE . '/' . $show['link']) }}">
              <i class="bi bi-circle"></i><span>{{ $show['name'] }}</span>
            </a>
          </li>
          @endforeach
          @if(isset($data['edit']))
          <li class="nav-heading">add</li>
          @foreach($data['edit'] as $show)
          <li>
            <a href="{{ url(MANAGE . '/' . $show['link']) }}">
              <i class="bi bi-circle"></i><span>{{ $show['name'] }}</span>
            </a>
          </li>
          @endforeach
          @endif
        </ul>
      </li>
      @endforeach
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url(MANAGE . '/profile/' . Auth::guard('admin')->user()->id) }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/contact') }}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield("title")</h1>

    </div><!-- End Page Title -->

    @yield("content")
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      You can make <strong><span>Consulta</span></strong> more strong.
    </div>
  </footer><!-- End Footer -->
        @if(Session::has('success'))
        <!-- session show alerts -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
  <script src="{{ asset('team/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('team/assets/js/main.js') }}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script>
  @yield("scripts")
</body>

</html>