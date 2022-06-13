<!-- Topbar Start -->
<div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><img src="/assets/img/KmerchLogo.png" width="50"
                        height="50"> Merch</h1>
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
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
        @endif
    </div>
    </div>
    <!-- Topbar End -->