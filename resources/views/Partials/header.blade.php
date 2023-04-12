@if(Auth::user()) 
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-11 d-flex align-items-center justify-content-between">
        <a href="/index" class="logo"><img src="img/logo.png" alt="" class="img-fluid"></a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="/index#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="/index#about">About</a></li>
            <li><a class="nav-link scrollto" href="/index#portfolio">News</a></li>
            <li><a class="nav-link scrollto" href="/index#equipa">Team</a></li>
            <li><a class="nav-link scrollto" href="/index#contact">FeedBack</a></li>
            <li class="dropdown"><a class="nav-link scrollto" href="/perfil">
                <div class="profile"><img src="#" alt="#"></div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
              </a>
              </ul>
            </li>
          </ul>
          @if ($alert && $alert->ativo)
            <button type="button" class="btn btn-danger position-relative" id="liveToastBtn">
              <i class="bi bi-bell-fill"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                1
              </span>
            </button>
          @endif
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </div>
  </div>

</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endif

@guest

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-11 d-flex align-items-center justify-content-between">
        <a href="/index" class="logo"><img src="img/logo.png" alt="" class="img-fluid"></a>
        <!--<h1 class="logo"><a href="index.html">Racing Mania</a></h1>-->
        <!-- Mudar -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">News</a></li>
            <li><a class="nav-link scrollto" href="#equipa">Team</a></li>
            <li data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><a href="{{ route('login') }}"><i
                  class="bi bi-person-fill"></i></a></li>
          </ul>
          @if ($alert && $alert->ativo)
            <button type="button" class="btn btn-danger position-relative" id="liveToastBtn">
              <i class="bi bi-bell-fill"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                1
              </span>
            </button>
          @endif

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </div>
  </div>

</header>

@endguest