<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <div class="d-flex justify-content-between">
          <a class="navbar-brand" href="{{ route('webview.index') }}"><img src="{{asset('web/assets/images/Logo.png')}}" class="img-fluid logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('webview.index') ? 'active' : '' }}"
                       href="{{ route('webview.index') }}">
                       Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('webview.aboutus') ? 'active' : '' }}"
                       href="{{ route('webview.aboutus') }}">
                       About us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('webview.contactus') ? 'active' : '' }}"
                       href="{{ route('webview.contactus') }}">
                       Contact us
                    </a>
                </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Log in
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('panchayat.login')}}">Officer login</a></li>
                  <li><a class="dropdown-item" href="{{route('panchayat.login')}}">Panchayat login</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>
