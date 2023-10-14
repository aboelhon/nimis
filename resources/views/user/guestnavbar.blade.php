<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="header_top_left">
                    <img src="{{ asset('style/images/car.png') }}" alt="Header Car Icon" />
                    <p>get free! shipping on order over <span>$100</span></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="header_top_right floatright">
                    <p><a href="{{ route('user.login') }}">login</a> / <a
                            href="{{ route('user.register') }}">register</a></p>
                    <nav class="currency alignleft">
                        <ul>
                            <li><a href="">USD</a>
                                <ul class="currency-dropdown">
                                    <li><a href="">EUR</a></li>
                                    <li><a href="">GBP</a></li>
                                    <li><a href="">CAD</a></li>
                                    <li><a href="">AUD</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="top-flag alignleft">
                        <img src="{{ asset('style/images/flag.png') }}" alt="Flags" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="header_left floatleft">
                    <a class="fa fa-search" href=""></a>
                    <input type="text" placeholder="search" />
                </div>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-12">
                <div class="header_center">
                    <a href="{{ route('home') }}"><img src="{{ asset('style/images/logo.png') }}" alt="Site Logo" /></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="header_right floatright">
                    <ul class="checkout">
                        @auth('user')
                            <li class="mobi_right_li"><a href="{{ route('user.cart') }}"><i
                                        class="fa fa-shopping-cart"></i>CART {{ $countitem }}</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('nav-menu')

@auth('user')
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="header_left floatleft">
                        <a class="fa fa-search" href=""></a>
                        <input type="text" placeholder="search" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 col-xs-12">
                    <div class="header_center">
                        <a href="{{ route('home') }}"><img src="{{ asset('style/images/logo.png') }}" alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="header_right floatright">
                        <ul class="checkout">
                            <li><a href="checkout.html"><i class="fa fa-heart-o"></i>wishlist</a></li>
                            <li class="mobi_right_li"><a href="checkout.html"><i
                                        class="fa fa-shopping-cart"></i>checklist</a></li>
                        </ul>
                        <div class="w_likes">
                            <span>3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
