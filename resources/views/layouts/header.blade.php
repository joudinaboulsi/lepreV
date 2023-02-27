<nav class="navbar navbar-expand-md fixed-top navbar-dark d-flex justify-content-between">

    <div class="container-fluid">

        <a href="/">
            <img src="{{ asset('/img/logo-white.png') }}" class="logo-white"
                alt="{{ app('settings')->store_address->legal_name }}" width="120">
            <img src="{{ asset('/img/logo.png') }}" class="logo-dark"
                alt="{{ app('settings')->store_address->legal_name }}" width="120">
        </a>

        <div id="main">
            <a href="{{ route('shopping_cart_path') }}" class="cartH" style="position: relative">

                <img src="{{ asset('/img/icons/cart-white.svg') }}" alt="Icon" height="18" class="icon-white">
                <i class="w-icon-cart"
                    style="    position: absolute;
    width: 20px;
    height: 20px;
    background: #eee;
    border-radius: 10px;
    /* align-items: center; */
    transform: translate(0px,-15px);
    text-align: center;
    font-size: 13px;">
                    <span class="cart-count" id="addToCart">{{ Cart::content()->count() }}</span>
                </i>
                <img src="{{ asset('/img/icons/cart.svg') }}" alt="Icon" height="18" class="icon-dark"> &nbsp;
                My cart
            </a>
            <span class="spann"> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;</span>
            <a href="/login" class="logH">
                <img src="{{ asset('/img/icons/user-white.svg') }}" alt="Icon" height="18" class="icon-white">
                <img src="{{ asset('/img/icons/user.svg') }}" alt="Icon" height="18" class="icon-dark">
                &nbsp;
                Login/Register
            </a>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            {{-- <a href="/search" class="searchHeader">
                <img src="{{ asset('/img/icons/search-white.svg') }}" alt="Icon" height="18" class="icon-white">
                <img src="{{ asset('/img/icons/search.svg') }}" alt="Icon" height="18" class="icon-dark">
                &nbsp;
            </a> --}}

            <span onclick="openNav()">
                <img src="{{ asset('/img/icons/menu-white.svg') }}" alt="Icon" height="15" class="icon-white">

                <img src="{{ asset('/img/icons/menu.svg') }}" alt="Icon" height="15" class="icon-dark">
                &nbsp;
            </span>
        </div>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div class="logocart">
                <a href="{{ route('shopping_cart_path') }}"style="position: relative"> <i class="w-icon-cart">
                        <span class="cart-count" id="addToCart"
                            style="position: absolute; width: 20px; height: 20px;
                            background: #eee; border-radius: 10px;  transform:
                            translate(0px,-15px); text-align: center; font-size: 13px;"
                            style="position: absolute">{{ Cart::content()->count() }}</span>
                    </i>
                    <img src="{{ asset('/img/icons/cart.svg') }}" alt="Icon"> &nbsp;
                    My cart

                </a>
                <span class="span-icon">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                <a href="/login">
                    <img src="{{ asset('/img/icons/user.svg') }}" alt="Icon"> &nbsp;
                    Login/Register
                </a>
            </div>

            <ul class="list">
                <li
                    class="{{ Route::currentRouteName() == 'eshop_path' || Route::currentRouteName() == 'eshop_category_path' || Route::currentRouteName() == 'eshop_product_path' ? 'active' : '' }}">
                    <a href="{{ route('eshop_path') }}">E-Shop</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'story_path' ? 'active' : '' }}"><a
                        href="{{ route('story_path') }}">Our Story</a></li>
                <li
                    class="has-submenu {{ Route::currentRouteName() == 'all_products_path' || Route::currentRouteName() == 'products_category_path' || Route::currentRouteName() == 'product_details_path' ? 'active' : '' }}">
                    <a href="{{ route('all_products_path') }}">Our Products</a>
                    <ul class="submenu-nav">
                        <li><a href="{{ route('products_category_path', [26, 'juices']) }}">All Juices</a></li>
                        <li><a href="{{ route('product_details_path', [29, 'apple-juice']) }}">Apple-Based Juices</a>
                        </li>
                        <li><a href="{{ route('product_details_path', [52, 'orange-juice']) }}">Citrus-Based
                                Juices</a></li>
                        <li><a href="{{ route('products_category_path', [28, 'vinegars']) }}">Vinegars</a></li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'news_path' ? 'active' : '' }}"><a
                        href="{{ route('news_path') }}">Latest News</a></li>
                <li class="{{ Route::currentRouteName() == 'csr_path' ? 'active' : '' }}"><a
                        href="{{ route('csr_path') }}">Opportunities</a></li>
                <li class="{{ Route::currentRouteName() == 'work_path' ? 'active' : '' }}"><a
                        href="{{ route('work_path') }}">Work with us</a></li>
                <li class="{{ Route::currentRouteName() == 'contact_path' ? 'active' : '' }}"><a
                        href="{{ route('contact_path') }}">Contact us</a></li>
            </ul>
        </div>
    </div>
</nav>
