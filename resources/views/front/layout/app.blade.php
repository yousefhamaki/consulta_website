<?php
$domain = "http://consulta.com:8000/";
//get menu
use App\Models\Menu\Menu;

$menu = Menu::with(["menufork" => function($q){
    $q->select('menu_id', "name", "logo", 'id')->where("status", "=", "1");
}])->where("status", "=", "1")->get();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="{{ asset('data/logo2.png') }}" rel="icon">
    <title>@yield("title")</title>
    <script>
        function alert(text, status){
            let element = document.createElement('p');
            let alert = `<div class='alert_g alert alert-${status} alert-dismissible fade show'>
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            ${text}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
            element.innerHTML = alert;
            document.body.appendChild(element)
            let exit_alert = document.querySelectorAll(".btn-close");

            exit_alert.forEach(alert =>{
                alert.addEventListener("click", ()=>{
                  alert.parentElement.parentElement.remove()
                })
            })
        }
    </script>
    <link href="{{ asset('team/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('team/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front_header.css') }}" />

  @yield("styles")
</head>
<body>
    <!--header -->
    <div id="nav">
        <a href="{{ $domain }}"><img class="page_logo" src="{{ asset('data/logo.png') }}" alt="logo" /></a>
    <div>
    @if(Auth::check())
    <!-- <div class="dropdown show">
        <a
          class="btn btn-secondary toggle_drop dropdown-toggle"
          href="#"
          role="button"
          id="dropdownMenuLink"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          {{ auth::user()->f_name }}
        </a>

        <div
          class="dropdown-menu"
          :class="{ show: show }"
          aria-labelledby="dropdownMenuLink"
        >
          <a class="dropdown-item" href="{{ url('/profile/' . auth::user()->id) }}">{{ auth::user()->f_name }} {{ auth::user()->l_name }}</a>

          <a class="dropdown-item" href="{{ url('/profile/' . auth::user()->id) }}">Setting</a>

          <a class="dropdown-item">Log out</a>
        </div>
      </div> -->
      <section class="login">
        <form action="/logout" method="post">
          @csrf 
          <button class="logout">تسجيل الخروج
          <i class="bi bi-door-open-fill login_icon"></i>
          </button>
        </form>
    </section>
    @else
    <section class="login">
      <a href="/login">
        تسجيل الدخول
          <i class="bi bi-door-open-fill login_icon"></i>
      </a>
    </section>

@endif 
    </div>
    <i class="bi bi-list-ul menu_button" :class="{ phone: phone }"></i>
  </div>

  <div class="menu">
      @foreach($menu as $el)
        <div class="menu_option">
            @if(count($el->menufork) > 0)
            <div class="option_name">{{ $el->name }}</div>
            <div class="option_added">
                @foreach($el->menufork as $fork)
            <div>
                <a href="{{ $domain . 'menu/fork/' . $fork->id }}">
                <i class="{{ $fork->logo }}"></i>
                {{ $fork->name }}
                </a>
            </div>
            @endforeach
            </div>
            @else
            <div class="menu_direct_link option_name">
            <a href="{{ $domain . 'menu/' . $el->id }}" class="link" style="position: relative;">
              <div class="option_name">{{ $el->name }}</div>
            </a>
            </div>
            @endif
        </div>
      @endforeach
  </div>

  <section class="awesome_container">
    @if(isset(auth::user()->id))
    <section class="awesome_option">
      <i class='bi bi-person'></i>
      <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ url('/profile/' . auth::user()->id) }}">{{ auth::user()->name }}</a>

          <a class="dropdown-item" href="{{ url('/profile/' . auth::user()->id) }}">Setting</a>

          <a class="dropdown-item">Log out</a>
        </div>
    </section>
    @else
    <section class="awesome_option">
      <a href="/login">
        <i class='bi bi-person'></i>
      </a>
    </section>
    @endif

    <section class="awesome_option">
      <i class='bi bi-bell'></i>
      <div class="dropdown-menu">
          <a class="dropdown-item">Log out</a>
        </div>
    </section>

    <section class="awesome_option">
      <a href="/chat">
        <i class='bi bi-chat'></i>
      </a>
    </section>

    <section class="awesome_option">
      <i class='bi bi-search'></i>

        <div class="dropdown-menu">
          <a class="dropdown-item">Log out</a>
        </div>
    </section>
  </section>
  <main class="app_content">
  @yield("content")
  </main>

  <footer>
      <secton class="footer_sec">
          <h5>الخدمات القانونيه</h5>
          <section class="data_section">
              <p data-page="law">تأسيس الشركات</p>
              <p data-page="law">قضايا الهجره واللجوء والجنسية</p>
              <p data-page="law">التحكيم الدولي</p>
              <p data-page="law">التسجيل بالشهر العقاري</p>
              <p data-page="law">الترجمة القانونية</p>
          </section>
      </secton>

      <secton class="footer_sec">
          <h5>سياسات الموقع</h5>
          <section class="data_section">
            <p data-page="privacy">سياسة الخصوصية</p>
            <p>سياسة الأستخدام</p>
          </section>
      </secton>

      <secton class="footer_sec">
          <h5>عن الموقع</h5>
          <section class="data_section">
              <p>من نحن</p>
              <p>أتصل بنا</p>
              <p data-page="report/add">الإبلاغ عن مشكلة</p>
          </section>
      </secton>

  </footer>
  
  <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{ asset('js/header.js') }}"></script>
@yield("scripts")
    
</body>
</html>