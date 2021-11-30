@extends('layouts.frontend')
@section('frontheader')
    @include('frontend.include.headerOne')
@endsection
@section('front')
    <div class="hero_single version_1">
        <div class="opacity-mask">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <h1>Delivery or Takeaway Food</h1>
                        <p>The best restaurants at the best price</p>
                        <form method="post" action="grid-listing-filterscol.html">
                            <div class="row no-gutters custom-search-input">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <input class="form-control no_border_r" type="text" id="autocomplete"
                                               placeholder="Address, neighborhood...">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn_1 gradient" type="submit">Search</button>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="search_trends">
                                <h5>Trending:</h5>
                                <ul>
                                    <li><a href="#0">Sushi</a></li>
                                    <li><a href="#0">Burgher</a></li>
                                    <li><a href="#0">Chinese</a></li>
                                    <li><a href="#0">Pizza</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="wave hero"></div>
    </div>
    <!-- /hero_single -->

    <div class="container margin_30_60">
        <div class="main_title center">
            <span><em></em></span>
            <h2>Popular Categories</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
        </div>
        <!-- /main_title -->

        <div class="owl-carousel owl-theme categories_carousel">
            @foreach($popular_cats as $pop_cats)
                <div class="item_version_2">
                    <a href="grid-listing-filterscol.html">
                        <figure>
                            <span>98</span>
                            @if(!empty($pop_cats->main_category_image) && file_exists($pop_cats->main_category_image))
                                <img src="{{asset($pop_cats->main_category_image)}}"
                                     data-src="{{asset($pop_cats->main_category_image)}}" alt=""
                                     class="owl-lazy" width="350" height="450">
                            @else
                                <img src="{{asset('assets/dashboard/images/default.jpg')}}"
                                     data-src="{{asset('assets/dashboard/images/default.jpg')}}" alt=""
                                     class="owl-lazy" width="350" height="450">
                            @endif
                            <div class="info">
                                <h3>{{$pop_cats->main_category_name}}</h3>
                                <small>Avg price $40</small>
                            </div>
                        </figure>
                    </a>
                </div>
            @endforeach

        </div>
        <!-- /carousel -->
    </div>
    <!-- /container -->

    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="main_title">
                <span><em></em></span>
                <h2>Top Rated Restaurants</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                <a href="#0">View All &rarr;</a>
            </div>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <div class="list_home">
                        <?php

                        $pop_res_left = \App\Models\Restaurant::orderBy('id', 'desc')->take(3)->get();
                        ?>
                        <ul>
                            @foreach($pop_res_left as $pop_reslef)
                                <li>
                                    <a href="{{route('front.restaurant.details',$pop_reslef->id)}}">
                                        <figure>
                                            <img src="{{asset($pop_reslef->restaurant_image)}}"
                                                 data-src="{{asset($pop_reslef->restaurant_image)}}"
                                                 alt="" class="lazy" width="350" height="233">
                                        </figure>
                                        <div class="score"><strong>9.5</strong></div>
                                        <em>Italian</em>
                                        <h3>{{$pop_reslef->restaurant_name}}</h3>
                                        <small>{!! $pop_reslef->restaurant_address !!}</small>
                                        <ul>
                                            <li><span class="ribbon off">-30%</span></li>
                                            <li>Average price $35</li>
                                        </ul>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="list_home">
                        <?php

                        $pop_res_right = \App\Models\Restaurant::orderBy('id', 'asc')->take(3)->get();
                        ?>
                        <ul>
                            @foreach($pop_res_right as $pop_resright)
                                <li>
                                    <a href="{{route('front.restaurant.details',$pop_resright->id)}}">
                                        <figure>
                                            <img src="{{asset($pop_resright->restaurant_image)}}"
                                                 data-src="{{asset($pop_resright->restaurant_image)}}"
                                                 alt="" class="lazy" width="350" height="233">
                                        </figure>
                                        <div class="score"><strong>9.5</strong></div>
                                        <em>Vegetarian</em>
                                        <h3>{{$pop_resright->restaurant_name}}</h3>
                                        <small>{!! $pop_resright->restaurant_address !!}</small>
                                        <ul>
                                            <li><span class="ribbon off">-30%</span></li>
                                            <li>Average price $20</li>
                                        </ul>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="banner lazy" data-bg="url(img/banner_bg_desktop.jpg)">
                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div>
                        <small>FooYes Delivery</small>
                        <h3>We Deliver to your Office</h3>
                        <p>Enjoy a tasty food in minutes!</p>
                        <a href="grid-listing-filterscol.html" class="btn_1 gradient">Start Now!</a>
                    </div>
                </div>
                <!-- /wrapper -->
            </div>
            <!-- /banner -->
        </div>
    </div>
    <!-- /bg_gray -->

    <div class="shape_element_2">
        <div class="container margin_60_0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box_how">
                                <figure><img src="{{asset('assets/frontend/')}}/img/lazy-placeholder-100-100-white.png"
                                             data-src="img/how_1.svg"
                                             alt="" width="150" height="167" class="lazy"></figure>
                                <h3>Easly Order</h3>
                                <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus
                                    sollicitudin.</p>
                            </div>
                            <div class="box_how">
                                <figure><img src="{{asset('assets/frontend/')}}/img/lazy-placeholder-100-100-white.png"
                                             data-src="img/how_2.svg"
                                             alt="" width="130" height="145" class="lazy"></figure>
                                <h3>Quick Delivery</h3>
                                <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id
                                    vestibulum.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="box_how">
                                <figure><img src="{{asset('assets/frontend/')}}/img/lazy-placeholder-100-100-white.png"
                                             data-src="img/how_3.svg"
                                             alt="" width="150" height="132" class="lazy"></figure>
                                <h3>Enjoy Food</h3>
                                <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat
                                    eros.</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-3 d-block d-lg-none"><a href="#0"
                                                                     class="btn_1 medium gradient pulse_bt mt-2">Register
                            Now!</a></p>
                </div>
                <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="intro_txt">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Start Ordering Now</h2>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id
                            nisi euismod, sed porta est consectetur deserunt.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur.</p>
                        <p><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /shape_element_2 -->
@endsection
