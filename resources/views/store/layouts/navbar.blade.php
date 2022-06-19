<!-- Navbar Start -->
<div class="container-fluid mb-3">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-2 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        <a href="/shop" class="nav-item nav-link {{ Request::is('shop') ? 'active' : '' }}">Shop</a>
                        @if (Request::is('login') or Route::is('register'))
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    @foreach ($categories as $category)
                                        <a href="/shop?category={{ $category->slug }}" class="dropdown-item">
                                            {{ $category->name }} </a>
                                    @endforeach
                                </div>

                            </div>
                        @endif
                        <a href="/contact"
                            class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                    </div>
                    {{-- <div class="navbar-nav ml-auto py-0">
                        <div class="col-lg-3 col-6 text-right">
                            <a href="" class="btn border">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge">0</span>
                            </a> --}}
                        @if (Route::has('login'))
                            
                            @auth
                                <a href="{{ url('showcart') }}" class="btn border">
                                    <i class="fas fa-shopping-cart text-primary">{{ $cartItem }}</i>
                                </a>
                        @else
                                <a href="{{ route('login') }}" class="nav-item nav-link {{ Request::is('login') ? 'active' : ''}}" style="margin-left:200px">Log in</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link {{ Request::is('register') ? 'active' : ''}}">Register</a>
                                @endif
                             @endauth   
                        @endif
                        

                    </div>
            </div>
            </nav>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
