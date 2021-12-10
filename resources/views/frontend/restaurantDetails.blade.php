@extends('layouts.frontend')
@section('css')
    <link href="{{asset('assets/frontend/')}}/css/detail-page.css" rel="stylesheet">
@endsection
@section('frontheader')
    @include('frontend.include.headerTwo')
@endsection
@section('front')
    <div class="container margin_detail_2">
        <div class="row">
            <div class="col-lg-8">
                <div class="detail_page_head clearfix">
                    <div class="rating">
                        <div class="score"><span>Superb<em>15 Reviews</em></span><strong>8.9</strong></div>
                    </div>
                    <div class="title">
                        <h1>{{$restaurant->restaurant_name}}</h1>
                        {!! $restaurant->restaurant_address !!} <a
                            href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"
                            target="blank">Get directions</a>
                        <ul class="tags">
                            <li><a href="#0">Pizza</a></li>
                            <li><a href="#0">Italian Food</a></li>
                            <li><a href="#0">Best Price</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /detail_page_head -->
                <h6>About "da Alfredo"</h6>
                <p>Mei at intellegat reprehendunt, te facilisis definiebas dissentiunt usu. Choro delicata voluptatum cu
                    vix.<br>Sea error splendide at. Te sed facilisi persequeris definitiones, ad per scriptorem
                    instructior, vim latine adipiscing no. Cu tacimates salutandi his, mel te dicant quodsi aperiri.
                    Unum timeam his eu.</p>
            </div>
            <div class="col-lg-4">
                <div class="pictures magnific-gallery clearfix">
                    <figure>
                        <a href="img/detail_gallery/detail_1.jpg" title="Photo title" data-effect="mfp-zoom-in">
                            <img src="img/thumb_detail_1.jpg" data-src="img/thumb_detail_1.jpg" class="lazy loaded"
                                 alt="" data-was-processed="true">
                        </a>
                    </figure>
                    <figure><a href="img/detail_gallery/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                src="img/thumb_detail_2.jpg" data-src="img/thumb_detail_2.jpg" class="lazy loaded"
                                alt="" data-was-processed="true"></a></figure>
                    <figure><a href="img/detail_gallery/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                src="img/thumb_detail_3.jpg" data-src="img/thumb_detail_3.jpg" class="lazy loaded"
                                alt="" data-was-processed="true"></a></figure>
                    <figure><a href="img/detail_gallery/detail_4.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                src="img/thumb_detail_4.jpg" data-src="img/thumb_detail_4.jpg" class="lazy loaded"
                                alt="" data-was-processed="true"></a></figure>
                    <figure><a href="img/detail_gallery/detail_4.jpg" title="Photo title" data-effect="mfp-zoom-in"><img
                                src="img/thumb_detail_6.jpg" data-src="img/thumb_detail_6.jpg" class="lazy loaded"
                                alt="" data-was-processed="true"></a></figure>
                    <figure><a href="img/detail_gallery/detail_5.jpg" title="Photo title"
                               data-effect="mfp-zoom-in"><span class="d-flex align-items-center justify-content-center">+10</span><img
                                src="img/thumb_detail_5.jpg" data-src="img/thumb_detail_5.jpg" class="lazy loaded"
                                alt="" data-was-processed="true"></a></figure>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <nav class="secondary_nav sticky_horizontal">
        <div class="container">
            <ul id="secondary_nav">
                @foreach($restaurant_item_cats as $menu_cats)
                    <?php
                    $men_cat_name = \App\Models\main_category::where('id', $menu_cats->main_category_id)->first();
                    ?>
                    <li><a class="list-group-item list-group-item-action" href="#section-1">
                            @if($men_cat_name)
                                {{$men_cat_name->main_category_name}}
                            @endif
                        </a></li>
                @endforeach

                <li><a class="list-group-item list-group-item-action" href="#section-5"><i class="icon_chat_alt"></i>Reviews</a>
                </li>
            </ul>
        </div>
        <span></span>
    </nav>
    <!-- /secondary_nav -->

    <div class="bg_gray">
        <div class="container margin_detail">
            <div class="row">
                <div class="col-lg-8 list_menu">
                    @foreach($restaurant_item_cats as $item_cat)
                        <?php
                        $item_cat_name = \App\Models\main_category::where('id', $item_cat->main_category_id)->first();
                        ?>
                        <section id="section-1">
                            <h4>{{$item_cat_name->main_category_name}}</h4>
                            <div class="table_wrapper">
                                <table class="table cart-list menu-gallery">
                                    <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Order
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $items = \App\Models\restaurant_item::where('restaurant_id', $item_cat->restaurant_id)->where('main_category_id', $item_cat->main_category_id)->get();
                                    ?>
                                    @foreach($items as $item)
                                        <tr>
                                            <td class="d-md-flex align-items-center">
                                                <figure>
                                                    <a href="{{asset($item->item_image)}}" title="Photo title"
                                                       data-effect="mfp-zoom-in"><img
                                                            src="{{asset($item->item_image)}}"
                                                            data-src="{{asset($item->item_image)}}"
                                                            alt="thumb" class="lazy"></a>
                                                </figure>
                                                <div class="flex-md-column">
                                                    <h4>{{$item->item_name}}</h4>
                                                    <p>
                                                        Fuisset mentitum deleniti sit ea.
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                <strong>${{$item->item_price}}</strong>
                                            </td>
                                            <td class="options">
                                                <div class="dropdown dropdown-options">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                    <div class="dropdown-menu">
                                                        <h5>Select an option</h5>
                                                        <ul class="clearfix">
                                                            <li>
                                                                <label class="container_radio">Medium<small>+
                                                                        $3.30</small>
                                                                    <input type="radio" value="option1"
                                                                           name="options_1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="container_radio">Large<small>+
                                                                        $5.30</small>
                                                                    <input type="radio" value="option2"
                                                                           name="options_1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="container_radio">Extra Large<small>+
                                                                        $8.30</small>
                                                                    <input type="radio" value="option3"
                                                                           name="options_1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <h5>Add ingredients</h5>
                                                        <ul class="clearfix">
                                                            <li>
                                                                <label class="container_check">Extra Tomato<small>+
                                                                        $4.30</small>
                                                                    <input type="checkbox">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="container_check">Extra Peppers<small>+
                                                                        $2.50</small>
                                                                    <input type="checkbox">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <a href="#0" class="btn_1">Add to cart</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </section>
                @endforeach
                <!-- /section -->


                </div>
                <!-- /col -->

                <div class="col-lg-4" id="sidebar_fixed">
                    <div class="box_order mobile_fixed">
                        <div class="head">
                            <h3>Order Summary</h3>
                            <a href="#0" class="close_panel_mobile"><i class="icon_close"></i></a>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <ul class="clearfix">
                                <li><a href="#0">1x Enchiladas</a><span>$11</span></li>
                            </ul>
                            <ul class="clearfix">
                                <li>Subtotal<span>$56</span></li>
                                <li>Delivery fee<span>$10</span></li>
                                <li class="total">Total<span>$66</span></li>
                            </ul>
                            <!-- /dropdown -->
                            
                            <!-- /dropdown -->
                            <div class="btn_1_mobile">
                                <a href="booking.html" class="btn_1 gradient full-width mb_5">Order Now</a>
                                <div class="text-center"><small>No money charged on this steps</small></div>
                            </div>
                        </div>
                    </div>
                    <!-- /box_order -->

                    <div class="btn_reserve_fixed"><a href="#0" class="btn_1 gradient full-width">View Basket</a></div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->

    <div class="container margin_30_20">
        <div class="row">
            <div class="col-lg-8 list_menu">
                <section id="section-5">
                    <h4>Reviews</h4>
                    <div class="row add_bottom_30 d-flex align-items-center reviews">
                        <div class="col-md-3">
                            <div id="review_summary">
                                <strong>8.5</strong>
                                <em>Superb</em>
                                <small>Based on 4 reviews</small>
                            </div>
                        </div>
                        <div class="col-md-9 reviews_sum_details">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Food Quality</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                     aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.0</strong></div>
                                    </div>
                                    <!-- /row -->
                                    <h6>Service</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                     aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.5</strong></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <div class="col-md-6">
                                    <h6>Punctuality</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
                                    </div>
                                    <!-- /row -->
                                    <h6>Price</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                    </div>
                    <!-- /row -->
                    <div id="reviews">
                        <div class="review_card">
                            <div class="row">
                                <div class="col-md-2 user_info">
                                    <figure><img src="img/avatar4.jpg" alt=""></figure>
                                    <h5>Lukas</h5>
                                </div>
                                <div class="col-md-10 review_content">
                                    <div class="clearfix add_bottom_15">
                                        <span
                                            class="rating">8.5<small>/10</small> <strong>Rating average</strong></span>
                                        <em>Published 54 minutes ago</em>
                                    </div>
                                    <h4>"Great Location!!"</h4>
                                    <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et
                                        nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has
                                        ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit
                                        molestie suscipiantur his et.</p>
                                    <ul>
                                        <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
                                        <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                        <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /review_card -->
                        <div class="review_card">
                            <div class="row">
                                <div class="col-md-2 user_info">
                                    <figure><img src="img/avatar1.jpg" alt=""></figure>
                                    <h5>Marika</h5>
                                </div>
                                <div class="col-md-10 review_content">
                                    <div class="clearfix add_bottom_15">
                                        <span
                                            class="rating">9.0<small>/10</small> <strong>Rating average</strong></span>
                                        <em>Published 11 Oct. 2019</em>
                                    </div>
                                    <h4>"Really great dinner!!"</h4>
                                    <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et
                                        nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has
                                        ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit
                                        molestie suscipiantur his et.</p>
                                    <ul>
                                        <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
                                        <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                        <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row reply">
                                <div class="col-md-2 user_info">
                                    <figure><img src="img/avatar.jpg" alt=""></figure>
                                </div>
                                <div class="col-md-10">
                                    <div class="review_content">
                                        <strong>Reply from Foogra</strong>
                                        <em>Published 3 minutes ago</em>
                                        <p><br>Hi Monika,<br><br>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros
                                            eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus
                                            te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut.
                                            Viderer petentium cu his. Tollit molestie suscipiantur his et.<br><br>Thanks
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /reply -->
                        </div>
                        <!-- /review_card -->
                    </div>
                    <!-- /reviews -->
                    <div class="text-right"><a href="leave-review.html" class="btn_1 gradient">Leave a Review</a></div>
                </section>
                <!-- /section -->
            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
@section('js')
    <script src="{{asset('assets/frontend/')}}/js/sticky_sidebar.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/sticky-kit.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/specific_detail.js"></script>
@endsection
