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
            let getAllRestaurants = function () {
                $.ajax({
                    type: "POST",
                    url: "{{route('front.get.all.restaurant')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                    },
                    success: function (data) {
                        console.log(data);
                        $('.append_res').empty();
                        $('.append_res').html(data.view);
                    }
                });
            };

            getAllRestaurants();
        })
    </script>
@endsection
