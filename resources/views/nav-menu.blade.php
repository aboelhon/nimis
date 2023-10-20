<section class="nav_area">
    <div class="container">
        <div class="nav_left floatleft">
            <a href="#">category<i class="fa fa-bars"></i></a>
            <div class="cat_mega_menu">
                <div class="cat_left">
                    <h5>Men's Fashon</h5>
                    <div class="cat_menu_line"></div>
                    <ul class="cat_nav">
                        @foreach ($all_cats as $cat)
                            @if (str_contains($cat->name, 'Men\'s Pants'))
                                <li><a href="{{ route('men.pants') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Men\'s T-shirt'))
                                <li><a href="{{ route('men.tishirts') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Men\'s Shoes'))
                                <li><a href="{{ route('men.shoes') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Men\'s Underwear'))
                                <li><a href="{{ route('men.underwear') }}">{{ $cat->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="cat_middle">
                    <h5>Women</h5>
                    <div class="cat_menu_line"></div>
                    <ul class="cat_nav">
                        @foreach ($all_cats as $cat)
                            @if (str_contains($cat->name, 'Women\'s Pants'))
                                <li><a href="{{ route('women.pants') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Women\'s T-shirt'))
                                <li><a href="{{ route('women.tishirts') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Women\'s Shoes'))
                                <li><a href="{{ route('women.shoes') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Women\'s Underwear'))
                                <li><a href="{{ route('women.underwear') }}">{{ $cat->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="cat_middle_right">
                    <h5>KIDS</h5>
                    <div class="cat_menu_line"></div>
                    <ul class="cat_nav">
                        @foreach ($all_cats as $cat)
                            @if (str_contains($cat->name, 'Kid\'s Pants'))
                                <li><a href="{{ route('kids.pants') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Kid\'s T-shirt'))
                                <li><a href="{{ route('kids.tishirts') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Kid\'s Shoes'))
                                <li><a href="{{ route('kids.shoes') }}">{{ $cat->name }}</a></li>
                            @endif
                            @if (str_contains($cat->name, 'Kid\'s Underwear'))
                                <li><a href="{{ route('kids.underwear') }}">{{ $cat->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="cat_img">
                    <img src="{{ asset('style/images/menu_cat.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="nav_center">
            <nav class="mainmenu">
                <ul id="nav">
                    <li class="current-page-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user.settings') }}"> <i class="fa fa-cog"
                                aria-hidden="true"></i> Settings</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard"
                                aria-hidden="true"></i>
                            Dashboard</a>
                    </li>
                    @auth('user')
                        <li>
                            <a class="nav-link" href="{{ route('user.logout') }}"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i> Logout</a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>

        <!-- MOBILE ONLY CONTENT -->
        <div class="only-for-mobile">
            <ul class="ofm">
                <li class="m_nav"><i class="fa fa-bars"></i> Main Menu</li>
            </ul>

            <!-- MOBILE MENU -->
            <div class="mobi-menu">
                <div id='cssmenu'>
                    <ul>
                        <li>
                            <a href='{{ route('home') }}'>Home</a>

                        </li>

                        <li class='has-sub'>
                            <a href='category-1.html'><span>category</span></a>
                            <ul>
                                <li class='has-sub'>
                                    <a href='#'><span>MEN</span></a>
                                    <ul>
                                        @foreach ($all_cats as $cat)
                                            @if (str_contains($cat->name, 'Men\'s Pants'))
                                                <li><a href="{{ route('men.pants') }}">{{ $cat->name }}</a></li>
                                            @endif
                                            @if (str_contains($cat->name, 'Men\'s T-shirt'))
                                                <li><a href="{{ route('men.tishirts') }}">{{ $cat->name }}</a></li>
                                            @endif
                                            @if (str_contains($cat->name, 'Men\'s Shoes'))
                                                <li><a href="{{ route('men.shoes') }}">{{ $cat->name }}</a></li>
                                            @endif
                                            @if (str_contains($cat->name, 'Men\'s Underwear'))
                                                <li><a href="{{ route('men.underwear') }}">{{ $cat->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                <li class='has-sub'>
                                    <a href='#'><span>WOMEN</span></a>
                                    <ul>
                                        @foreach ($all_cats as $cat)
                                            @if (str_contains($cat->name, 'Women\'s'))
                                                <li><a href="">{{ $cat->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class='has-sub'>
                                    <a href='#'><span>KIDS</span></a>
                                    <ul>
                                        @foreach ($all_cats as $cat)
                                            @if (str_contains($cat->name, 'Kid\'s'))
                                                <li><a href="">{{ $cat->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="img-nav">
                                    <div class="container">
                                        <div class="clearfix"></div>
                                        <div class="space20"></div>
                                        <div class="clearfix"></div>
                                        <div class="row in1">
                                            <div class="col-md-6">
                                                {{-- <a href="#"><img src="{{asset('style/images/menu_cat.png')}}"
                                                        class="img-responsive" alt="" /></a> --}}
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="space20"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="space20"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='category-2.html'><span>shop</span></a>
                        </li>
                        <li class='has-sub'>
                            <a href='category-1.html'><span>accessories</span></a>
                            <ul class="sub-nav">
                                <li><a href="#"><span>check shirts</span></a></li>
                                <li><a href="#"><span>denim shirts</span></a></li>
                                <li><a href="#"><span>long sleeve shirts</span></a></li>
                                <li><a href="#"><span>plain shirts</span></a></li>
                                <li><a href="#"><span>printed shirts</span></a></li>
                                <li><a href="#"><span>short sleeve shirts</span></a></li>
                                <li><a href="#"><span>shortsleeve denim shirts</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'>
                            <a href='#'><span>pages</span></a>
                            <ul id="sub-nav">
                                <li><a href="category-1.html">Category page</a></li>
                                <li><a href="category-2.html">Category page without filter</a></li>
                                <li><a href="checkout.html">Checkout page</a></li>
                                <li><a href="cart.html">Cart page</a></li>
                                <li><a href="product-detail.html">Product detail page</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Blog single</a></li>
                                <li><a href="contact.html">Contact page</a></li>
                                <li><a href="404.html">404 page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href='blog.html'><span>Blog</span></a>
                        </li>
                        <li>
                            <a href='cart.html'><span>cart</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- MOBILE ONLY CONTENT -->
    </div>
</section>
