@extends('layouts.frontend')
@section('css')
    <link href="{{asset('assets/frontend/')}}/css/listing.css" rel="stylesheet">
@endsection
@section('frontheader')
    @include('frontend.include.headerOne')
@endsection
@section('front')
    <br>
    <br>
    <br>
    <br>
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <h1>145 restaurants in Convent Street 2983</h1>
                    <a href="#0">Change address</a>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <input type="text" class="form-control" placeholder="Dishes, restaurants or cuisines">
                        <button type="submit"><i class="icon_search"></i></button>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->

    <div class="container margin_30_20">
        <div class="row">


            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title_small">Top Categories</h2>
                        <div class="owl-carousel owl-theme categories_carousel_in listing">
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_1.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Pizza</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_2.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Sushi</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_3.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Dessert</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_4.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Hamburgher</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_5.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Ice Cream</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_6.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Kebab</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_7.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Italian</h3></a>
                                </figure>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="img/cat_listing_placeholder.png" data-src="img/cat_listing_8.jpg" alt=""
                                         class="owl-lazy"></a>
                                    <a href="#0"><h3>Chinese</h3></a>
                                </figure>
                            </div>
                        </div>
                        <!-- /carousel -->
                    </div>
                </div>
                <!-- /row -->

                <div class="promo">
                    <h3>Free Delivery for your first 14 days!</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <i class="icon-food_icon_delivery"></i>
                </div>
                <!-- /promo -->

                <div class="append_res">
                    <div class="row">
                        <div class="col-12"><h2 class="title_small">Top Rated</h2></div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <figure>
                                    <span class="ribbon off">15% off</span>
                                    <img src="img/lazy-placeholder.png" data-src="img/location_1.jpg"
                                         class="img-fluid lazy"
                                         alt="">
                                    <a href="detail-restaurant.html" class="strip_info">
                                        <small>Pizza</small>
                                        <div class="item_title">
                                            <h3>Da Alfredo</h3>
                                            <small>27 Old Gloucester St</small>
                                        </div>
                                    </a>
                                </figure>
                                <ul>
                                    <li><span class="take yes">Takeaway</span> <span class="deliv yes">Delivery</span>
                                    </li>
                                    <li>
                                        <div class="score"><strong>8.9</strong></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /strip grid -->

                        <!-- /strip grid -->
                    </div>
                    <!-- /row -->
                    <div class="pagination_fg">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
            <!-- /col -->
        </div>
    </div>
    <!-- /container -->

@endsection
@section('js')
    <script src="{{asset('assets/frontend/')}}/js/sticky_sidebar.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/specific_listing.js"></script>
    <script>
        $(document).ready(function () {
            
        })
    </script>
@endsection
