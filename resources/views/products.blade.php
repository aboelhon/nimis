@extends('user.style')

@section('title')
    Product
@endsection
@section('livewire')
    <section class="gray_tshirt_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="gray_tshirt">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_product_image_tab">
                                    <div role="tabpanel">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home">
                                                <div class="col">
                                                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner" role="listbox">
                                                            @foreach ($item->photos as $photo)
                                                                <div class="carousel-item active">
                                                                    <img src="{{ asset(Storage::url("$photo->name")) }}"
                                                                        class="w-100 d-block" alt="First slide">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselId" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselId" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="product_detail_heading">
                                    <div class="detail_heading_left">
                                        <h3>{{ $item->name }}</h3>
                                        <div class="old_price_gray">
                                            <p><small>PRICE:</small> ${{ $item->price }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-group product_accordion" id="home-accordion-single" role="tablist"
                                    aria-multiselectable="true">
                                    <div class="panel panel-default product_default">
                                        <div class="panel-heading product_accordion_heading" role="tab"
                                            id="headingOneP">
                                            <h4 class="panel-title product_accordion_head">
                                                <a data-toggle="collapse" data-parent="#home-accordion-single"
                                                    href="#collapseOneP" aria-expanded="true" aria-controls="collapseOneP">
                                                    Description
                                                    <span class="floatright"><i class="fa fa-minus"></i></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOneP" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingOneP">
                                            <div class="panel-body product_ac_body">
                                                <p>{{ $item->description }}
                                                    <br>
                                                    @if ($item->size != null)
                                                        Size: {{ $item->size }}
                                                    @endif
                                                </p>
                                                <div style="background-color:#f7f8f9;">
                                                    @livewire('products', ['item' => $item])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://fastly.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script></script>
@endsection
