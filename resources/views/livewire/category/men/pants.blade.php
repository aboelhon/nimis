<div>


    <section id="menpants">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bread_top_box ">
                        <h2>Men Pants</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="main_category_area product_page_caro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main_category_right product-box">
                        <h3 class="product">related products</h3>
                        <div class="multi_line"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="owl-example-single" class="owl-carousel">
                                    @foreach ($pants as $pant)
                                        @foreach ($pant->categories as $category)
                                            @if ($category->pivot['category_id'] == 1)
                                                <div class="item">
                                                    <div class="item-img">
                                                        @foreach ($pant->photos as $photo)
                                                            <img class="img-responsive img-thumbnail"
                                                                src="{{ Storage::url("$photo->name") }}" alt="">
                                                            @php
                                                                break;
                                                            @endphp
                                                        @endforeach
                                                        <div class="tr-add-cart">
                                                            <ul>
                                                                <li><a class="fa fa-shopping-cart tr_cart"
                                                                        href="{{ route('productid', $pant->slug) }}"></a>
                                                                </li>
                                                                <li><a class="tr_text"
                                                                        href="{{ route('productid', $pant->slug) }}">ADD
                                                                        TO CART</a>
                                                                </li>
                                                                <li><a class="fa fa-heart tr_heart"
                                                                        href="{{ route('productid', $pant->slug) }}"></a>
                                                                </li>
                                                                <li><a class="fa fa-search tr_search"
                                                                        href="{{ route('productid', $pant->slug) }}"></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="item-new">
                                                            <p>New</p>
                                                        </div>
                                                        <div class="item-sub">
                                                            <a href="{{ route('productid', $pant->slug) }}">
                                                                <h5>{{ $pant->name }}</h5>
                                                            </a>
                                                            <p>$ {{ $pant->price }}</p>
                                                        </div>
                                                    </div>
                                                </div>{{-- END ITEM  --}}
                                            @endif
                                        @endforeach
                                    @endforeach{{-- END BIG LOOP --}}
                                </div> {{-- end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
