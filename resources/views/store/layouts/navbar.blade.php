<!-- Navbar Start -->
<header>
    <div class="container-fluid mb-3">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-2 px-0">
                    <a href="" class="text-decoration-none">
                        <img src="/assets/img/uslogo.jpeg" width="50" height="50">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="text-primary nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                            <a href="/shop" class="text-primary nav-item nav-link {{ Request::is('shop') ? 'active' : '' }}">Shop</a>
                            @if (Request::is('login') or Route::is('register'))
                            @else
                            <div class="nav-item dropdown">
                                <a href="#" class="text-primary nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    @foreach ($categories as $category)
                                    <a href="/shop?category={{ $category->slug }}" class="dropdown-item">
                                        {{ $category->name }} </a>
                                    @endforeach
                                </div>

                            </div>
                            @endif
                            <a href="/contact" class="text-primary nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                            <div class="navbar-nav justify-content-end">
                                <div class="nav-item dropdown">
                                    @if (Route::has('login'))
                                    @auth
                                    <a href="#" class="text-primary nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name }}</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        @can('admin')
                                        <a href="/dashboard" class="dropdown-item">Dashboard</a>
                                        @endcan
                                        <a href="/profile" class="dropdown-item">Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </div>

                                    {{-- @else --}}
                                    {{-- <a href="{{ route('login') }}" class="nav-item nav-link {{ Request::is('login') ? 'active' : ''}}">Log in</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link {{ Request::is('register') ? 'active' : ''}}">Register</a>
                                    @endif --}}


                                    @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if (Route::has('login'))
                        @auth
                        <a href="/cart" class="btn border text-primary">
                            <i class="fas fa-shopping-cart"> {{ $cartItem }}</i>
                        </a>
                        <a href="search" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="text-primary nav-item nav-link {{ Request::is('login') ? 'active' : ''}}">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-primary nav-item nav-link {{ Request::is('register') ? 'active' : ''}}">Register</a>
                        @endif
                        <a href="search" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>

                    @endauth
                    @endif

            </div>
        </div>
    </div>
    </nav>
    </div>
    </div>
    </div>
</header>
<!-- Navbar End -->