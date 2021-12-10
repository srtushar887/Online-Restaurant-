<div class="row">
    <div class="col-12"><h2 class="title_small">Top Rated</h2></div>
    @foreach($all_res as $res)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="strip">
                <figure>
                    <span class="ribbon off">15% off</span>
                    <img src="{{asset($res->restaurant_image)}}"
                         data-src="{{asset($res->restaurant_image)}}"
                         class="img-fluid lazy"
                         alt="">
                    <a href="{{route('front.restaurant.details',$res->id)}}" class="strip_info">
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
@endforeach
<!-- /strip grid -->

    <!-- /strip grid -->
</div>
<!-- /row -->

{{$all_res->links()}}
