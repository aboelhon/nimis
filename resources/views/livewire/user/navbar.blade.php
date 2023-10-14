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
                        <a href="{{ route('home') }}"><img src="{{ asset('style/images/logo.png') }}"
                                alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="header_right floatright">
                        <ul class="checkout">
                            @auth('user')
                                @if ($countitem > 0)
                                    <li class="mobi_right_li"><a href="{{ route('user.cart') }}"><i
                                                class="fa fa-heart-o"></i>CART {{ $countitem }}</a></li>
                                @else
                                    <li class="mobi_right_li"><a href="{{ route('user.cart') }}"><i
                                                class="fa fa-heart-o"></i>CART </a></li>
                                @endif
                                <li class="mobi_right_li"><a href="{{ route('user.order') }}"><i
                                            class="fa fa-history"></i>Orders</a></li>
                                <li class="mobi_right_li"><a href="{{ route('user.checkout') }}"><i
                                            class="fa fa-shopping-cart"></i>checklist</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <p>Welcome <span style="color: orangered">{{ Auth::guard('user')->user()->name }}</span></p>
                        <nav class="currency alignleft">
                            <ul>
                                <li><a href=""><i class="fa fa-language" aria-hidden="true"></i> Languae</a>
                                    <ul class="currency-dropdown">
                                        <li><a href="">AR</a></li>
                                        <li><a href="">EN</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        {{-- <div class="top-flag alignleft">
                            <img src="{{ asset('style/images/flag.png') }}" alt="Flags" />
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('nav-menu')
</div>
