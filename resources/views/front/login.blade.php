<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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
  <!-- <link href="{{ asset('team/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('team/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> -->

  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('team/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('data/logo2.png') }}" alt="">
                  <span class="d-lg-block">Consulta</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{Session::get('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                  <section class="social_login">
                   <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">
                      <i class="fa fa-facebook-f fa-fw" style="color: blue;"></i>
                      <strong style="color: blue;">Login with Facebook</strong>
                    </a>
                    <a href="{{ url('auth/google') }}"  class="btn btn-google btn-user">
                    <i class="fa fa-google fa-fw" style="color: 9e9e9e !important;"></i>
                      <strong style="color: 9e9e9e !important;">Login With Google</strong>
                    </a>
                  </section>

                  <form class="row g-3 needs-validation" method="post" action="{{ url('login') }}"  novalidate>
                        @csrf
                    <div class="col-12">
                      <label for="youremail" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="youremail" required>
                        <div class="invalid-feedback">Please enter your E-mail.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ url('/register') }}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('team/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- <script src="{{ asset('team/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('team/assets/vendor/echarts/echarts.min.js') }}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{ asset('team/assets/js/main.js') }}"></script>

</body>

</html>