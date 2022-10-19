<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Search CVs') }}</title>--}}

    <title>CV</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/hmMenu.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{asset('css/main.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('css/hmMenu.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/signupSum.css')}}"/>

</head>
<body>
    <div id="app" class="mt-auto">
        <div id="navbar">
            <div id="navButtons">
                <span>My CV Page</span>
                <a href="{{route('main')}}">Home</a>
                <a href="{{route('project')}}">Projects</a>
                <a href="{{route('contacts')}}">Contact Me</a>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Aston CV Page') }}--}}
{{--                </a>--}}


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                            @if(Auth::check())
                                <div class="hmMenu" onmouseover="showMenu()" onmouseout="hideMenu()" onclick="menuLoad()">
                                    <a id="icon">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <div id="links">
                                    <a id="link" href="{{route('search_cvs')}}">Search a CV</a>
                                    <a id="link" href="{{route('list_cvs')}}">Search all CVs</a>
                                    <a id="link" href="{{route('create')}}">Create CV</a>
                                    <a id="link" href="{{route('update')}}">Update CV</a>
                                    </div>
                                </div>
                            @else

                            @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="{{route('main')}}">
                                        Return to Homepage
                                    </a>

                                    <a class="dropdown-divider">
                                        <hr class="dropdown-divider"/>
                                    </a>

                                    <a class="dropdown-item" href="{{route('search_cvs')}}">
                                        Search for CVs
                                    </a>

                                    <a class="dropdown-item dropdown-item-text" href="{{route('list_cvs')}}">
                                        Show All CVs
                                    </a>

                                    <a class="dropdown-item" href="{{route('create')}}">
                                        Create a CV
                                    </a>

                                    <a class="dropdown-item" href="{{route('update')}}">
                                        Update a CV
                                    </a>

                                    <a class="dropdown-divider">
                                        <hr class="dropdown-divider"/>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                </div>

            </div>
        </nav>



        <div id="main-container">
                @yield('cvCollectionSummary')

                @yield('createCV')
                @yield('updateCV')
                @yield('currentCV')

                @yield('contacts')

                @yield('main')

                @yield('projects')

                @yield('viewAll')

        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <br/>
    <br/>

    <footer class="footer">
        <nav>
        <span id="pages">
          <a href="{{route('main')}}">About Me</a>
          <a href="{{route('project')}}">Projects</a>
          <a href="{{route('contacts')}}">Contact Me</a>
        </span>
        </nav>
        <nav>
            <!-- Github Logo https://github.com/logos -->
            <span id="social">
          <a href="https://github.com/210029073">
            <img
                src="{{asset('PNG/GitHub-Mark-120px-plus.png')}}"
                alt="Github Logo"
                height="50"
                width="50"
            />
          </a>

                <!-- Linkedin Logo https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png -->
          <a href="https://www.linkedin.com/in/ibrahim-ahmad-ab3714231/">
            <img
                src="{{asset('PNG/LinkedIn_logo_initials.png')}}"
                alt="Linkedin Logo"
                height="50"
                width="50"
            />
          </a>

                <!-- Twitter Logo https://1000logos.net/wp-content/uploads/2017/06/Logo-Twitter.jpg -->
          <a
              href="https://twitter.com/AstonUniversity?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
          >
            <img
                src="{{asset('PNG/124021.png')}}"
                alt="Twitter Logo"
                height="50"
                width="50"
            />
          </a>
        </span>
        </nav>
        <span>Created by Ibrahim Ahmad (210029073)</span>
    </footer>
</body>
</html>
