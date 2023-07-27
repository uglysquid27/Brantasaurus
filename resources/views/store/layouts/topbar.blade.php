<!-- Topbar Start
<div class="d-flex align-items-center justify-content-center py-3 px-xl-5">
    <div class="col-lg-3 d-lg-block">
        <a href="" class="text-decoration-none">
            <img src="/assets/img/uslogo.jpeg" width="50" height="50"> 
        </a>
    </div>
    @if(Request::is('login') OR Route::is('register'))
    @else
    <div class="col-lg-6 col-6 text-left">
        <form action="/shop">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products" name="search">
                <button type="submit" class="input-group-text bg-transparent text primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    
   
        @if (Route::has('login'))
        @auth
        <div class="nav-item dropdown" style="margin-left:250px">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{
                Auth::user()->name }}</a>
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
        </div>
        {{-- @else --}}
        {{-- <a href="{{ route('login') }}" class="nav-item nav-link {{ Request::is('login') ? 'active' : ''}}" style="margin-left:200px">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="nav-item nav-link {{ Request::is('register') ? 'active' : ''}}">Register</a>
        @endif --}}


        @endauth
        @endif
    </div>
    @endif
</div>
</div>
Topbar End -->