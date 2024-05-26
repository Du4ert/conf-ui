<!-- Right Side Of Navbar -->
<ul class="navbar-nav auth-nav">
<!-- Authentication Links -->
@guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Str::limit(Auth::user()->email, 15, '...') }}
        </a>

        <div class="dropdown-menu dropdown-menu-end text-white theme-bg-dark" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-white" href="{{ route('home') }}">
                {{ __('Home') }}
            </a>
            <a class="dropdown-item text-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
</ul>