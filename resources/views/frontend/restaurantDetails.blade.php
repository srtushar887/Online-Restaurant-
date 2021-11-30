@extends('layouts.frontend')
@section('css')
    <link href="{{asset('assets/frontend/')}}/css/detail-page.css" rel="stylesheet">
@endsection
@section('frontheader')
    @include('frontend.include.headerTwo')
@endsection
@section('front')
    <div class="hero_in detail_page background-image" data-background="url(img/hero_general.jpg)">
        <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">

            <div class="container">
                <div class="main_info">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6">
                            <div class="head">
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                            </div>
                            <h1>Pizzeria da Alfredo</h1>
                            ITALIAN - 27 Old Gloucester St, 4530 - <a
                                href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"
                                target="blank">Get directions</a>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-6">
                            <div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="img/detail_1.jpg" class="btn_hero" title="Photo title"
                                           data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										<a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
									</span>
                                <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main_info -->
            </div>
        </div>
    </div>
    <!--/hero_in-->

    <nav class="secondary_nav sticky_horizontal">
        <div class="container">
            <ul id="secondary_nav">
                @foreach($restaurant_item_cats as $item_cats)
                    <?php
                    $cat_name_m = \App\Models\main_category::where('id', $item_cats->main_category_id)->first();
                    ?>
                    <li><a class="list-group-item list-group-item-action"
                           href="#section-1">{{$cat_name_m->main_category_name}}</a></li>
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
                    @foreach($restaurant_item_cats as $res_item_cat)
                        <?php
                        $cat_name = \App\Models\main_category::where('id', $res_item_cat->main_category_id)->first();
                        $items = \App\Models\restaurant_item::where('restaurant_id', $res_item_cat->restaurant_id)->where('main_category_id', $res_item_cat->main_category_id)->get();
                        ?>
                        @if(count($items) > 0)
                            <section id="section-1">
                                <h4>
                                    @if($cat_name)
                                        {{$cat_name->main_category_name}}
                                    @endif
                                </h4>
                                <div class="row">
                                    @foreach($items as $item)
                                        <div class="col-md-6">
                                            <a class="menu_item modal_dialog" href="#modal-dialog">
                                                <figure><img
                                                        src="{{asset('assets/frontend/')}}/img/menu-thumb-placeholder.jpg"
                                                        data-src="{{asset($item->item_image)}}"
                                                        alt="thumb" class="lazy"></figure>
                                                <h3>{{$item->item_name}}</h3>
                                                <p>{!! $item->item_description !!}</p>
                                                <strong>${{$item->item_price}}</strong>
                                            </a>
                                        </div>




                                    @endforeach

                                </div>

                                <div id="modal-dialog" class="zoom-anim-dialog mfp-hide">
                                    <div class="small-dialog-header">
                                        <h3>Cheese Quesadilla</h3>
                                    </div>
                                    <div class="content">
                                        <h5>Quantity</h5>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="qty_1" class="qty2 form-control"
                                                   name="quantity">
                                        </div>
                                        <h5>Size</h5>
                                        <ul class="clearfix">
                                            <li>
                                                <label class="container_radio">Medium<span>+ $3.30</span>
                                                    <input type="radio" value="option1" name="options_1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="container_radio">Large<span>+ $5.30</span>
                                                    <input type="radio" value="option2" name="options_1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="container_radio">Extra Large<span>+ $8.30</span>
                                                    <input type="radio" value="option3" name="options_1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                        <h5>Extra Ingredients</h5>
                                        <ul class="clearfix">
                                            <li>
                                                <label class="container_check">Extra Tomato<span>+ $4.30</span>
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="container_check">Extra Peppers<span>+ $2.50</span>
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="container_check">Extra Ham<span>+ $4.30</span>
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer">
                                        <div class="row small-gutters">
                                            <div class="col-md-4">
                                                <button type="reset" class="btn_1 outline full-width mb-mobile">
                                                    Cancel
                                                </button>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="reset" class="btn_1 full-width">Add to cart
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /Row -->
                                    </div>
                                </div>
                                <!-- /Modal item order -->


                                <!-- /row -->
                            </section>
                    @endif
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
                                <a href="order.html" class="btn_1 gradient full-width mb_5">Order Now</a>
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
