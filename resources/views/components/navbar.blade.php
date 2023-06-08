<nav class="navbar navbar-expand-lg bg-warning shadow-lg mb-4">
    <div class="container">
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Dashbord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Reserver en plass</a>
                </li>
                @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
                            Administrasjon</a>
                    </li>
                @endif
            </ul>
            <div class="d-flex">
                @livewire('user.checkin-button', ['user' => auth()->user()])
                <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <img src="{{ auth()->user()->profile_picture }}" alt="Profile picture" class="rounded-circle"
                                 width="40" height="40">
                        </a>
                        <ul class="dropdown-menu">
                            {{--                            <li><a class="dropdown-item" href="#">Profil</a></li>--}}
                            {{--                            <li><a class="dropdown-item" href="#">Innstillinger</a></li>--}}
                            {{--                            <li>--}}
                            {{--                                <hr class="dropdown-divider">--}}
                            {{--                            </li>--}}
                            <li><a class="dropdown-item" href={{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Logg ut</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
