<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies</title>

    <link rel="stylesheet" href="/css/main.css">
    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/contact.css">


</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Home</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('contact.index') }}" class="hover:text-gray-300">Contact Us</a>
                </li>
                @guest
                            <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                </li>
                            @if (Route::has('register'))
                                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
                </li>
                            @endif
                        @else
                            <li class="md:ml-6 mt-3 md:mt-0 dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>          
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
    @yield('scripts')
</body>
</html>
