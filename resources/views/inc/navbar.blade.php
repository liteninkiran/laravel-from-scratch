{{-- Navbar --}}
<nav class="navbar navbar-expand-xl navbar-dark bg-dark mb-5">

    <div class="container">

        {{-- Project Title --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        {{-- Hamburger Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav me-auto">

            </ul>

            <ul class="navbar-nav me-auto mb-2 mb-xl-0">

                {{-- Home --}}
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>

                {{-- About --}}
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                {{-- Services --}}
                <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                </li>

                {{-- Posts --}}
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Posts</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest

                    {{-- Login --}}
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- Register --}}
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @else

                    {{-- Create Post --}}
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/posts/create">Create Post</a>
                    </li>

                    {{-- User Menu --}}
                    <li class="nav-item dropdown">

                        {{-- User Name --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        {{-- Logout --}}
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            {{-- Link --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            {{-- Form --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>

                    </li>

                @endguest

            </ul>

        </div>

    </div>

</nav>

