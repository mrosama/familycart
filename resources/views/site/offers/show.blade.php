@extends('site.layouts.master')
@section('content')

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="main-product-partion">
                    <div class="main-product-info dir-rtl">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="product-info-img" >
                                    <img id="zoom_03"  src="assets/img/products/img-(24).jpg"  data-zoom-image="assets/img/products/img-(24).jpg"/>
                                    <div id="gallery_01">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="info-txt-part">
                                    <h4 id="modal_title"></h4>
                                </div>
                                <div class="info-txt-part">
                                    <p class="product-tag" id="modal_offer"></p>
                                    <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>{{trans('lang.price')}}</h5>
                                    <div class="prod-salary">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12  text-muted"> <span id="original_price_modal"> 2500</span> {{trans('lang.SR')}}</div>
                                            <div class="col-md-12 col-xs-12" >{{trans('lang.now')}} <span id="discount_price_modal"> 2000</span> {{trans('lang.SR')}} <span class="saved-btn">وفر الآن 350 ر.س (50% </span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>تقييم المنتج</h5>
                                    <div class="info-txt-part-con">
                                        <ul class="users-stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-full"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>3.5</strong></li>
                                            <li><a href="#" class="text-muted">(<span>3087</span> تقييم)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <div class="finish-list-a">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="{{URL::to('/').'/'.$lang.'/cart'}}"  class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.buy_now')}} </a></div>
                                            <div class="col-md-6 col-xs-6"><a href="javascript:;" onclick="" id="add_to_cart" class="bask-link-gray"><i class="fa fa-shopping-cart"></i> {{trans('lang.add_to_cart')}} </a></div>
                                        </div>
                                        <br>
                                        <a href="" id="product_page_modal">{{trans('lang.all_details')}}</a>
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
<!-- End Modal -->

<section id="main-content">
    <!--#slider-->
    <section id="slider">
        <div class="container">
            <div class="row">
                @if($sliders)
                <div class="col-md-12 col-sm-12 head-slider">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php for ($i = 0; $i < count($sliders); $i++) { ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>
                            <?php } ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $i = 0; ?>
                            @foreach($sliders as $slider)
                            <div class="item <?php echo ($i === 0) ? ' active' : ' '; ?>">
                                <a href="{{$slider->link}}">
                                    <img src="{{URL::to('/images/sliders').'/'. $slider->image }}" alt="slider images" class="slider-img">
                                </a>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>



    <section>
        <div class="partion">
            <div class="container">
                <div class="offers-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">
                                @if($lang == 'en')
                                {{$first_off->name_en}}
                                @else
                                {{$first_off->name_ar}}
                                @endif
                            </a> </li>
                        <li><a data-toggle="tab" href="#menu1">
                                @if($lang == 'en')
                                {{$second_off->name_en}}
                                @else
                                {{$second_off->name_ar}}
                                @endif
                            </a></li>
                        <li><a data-toggle="tab" href="#menu2"> 
                                @if($lang == 'en')
                                {{$third_off->name_en}}
                                @else
                                {{$third_off->name_ar}}
                                @endif
                            </a></li>
                       <!-- <a href="search.html" class="view-all dir-rtl"> إظهار الكل <i class="fa fa-angle-double-left fa-lg"></i></a>-->
                    </ul>

                    @if($first_offers)
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="part-con">
                                <div id="owl-demo">
                                    @foreach($first_offers as $row)
                                    <?php
                                    $product = \App\Product::find($row->product_id);
                                    $offer_id = $row->offer_id;
                                    ?>
                                    @if($product)
                                    <div class="prod-item">
                                        <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id }}" class="item">
                                            <p class="product-tag"> 
                                                @if($lang == 'en')
                                                {{$first_off->name_en}}
                                                @else
                                                {{$first_off->name_ar}}
                                                @endif
                                            </p>
                                            <div class="prod-img">
                                                <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="offer image">
                                                <div class="hover-prod-btn">
                                                    <ul>
                                                        <li><a  href="javascript:;" onclick="add_to_cart({{$product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                                        <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-brand">
                                                @if($lang == 'en')
                                                {{$product->name_en}}
                                                @else
                                                {{$product->name_ar}}
                                                @endif
                                            </div>
                                            <div class="prod-name">
                                                <p>
                                                    @if($lang == 'en')
                                                    {{$product->name_en}}
                                                    @else
                                                    {{$product->name_ar}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="prod-salary">
                                                <div class="row">
                                                    @if($product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$product->original_price}} {{trans('lang.SR')}} </div>@endif
                                                    <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$product->discount_price}} {{trans('lang.SR')}}</div>
                                                </div>
                                            </div>
                                            <div class="prod-btns">
                                                @if($product->original_price != 0)
                                                <span class="saved-btn">
                                                    <?php
                                                    $save_price = ($product->original_price - $product->discount_price);
                                                    $percent_price = number_format((($product->original_price - $product->discount_price) / ($product->original_price)) * 100);
                                                    ?>
                                                    <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                                </span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="part-con">
                                <div id="owl-demo-3">
                                    @foreach($second_offers as $row)
                                    <?php
                                    $product = \App\Product::find($row->product_id);
                                    $offer_id = $row->offer_id;
                                    ?>
                                    <div class="prod-item">
                                        <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id }}" class="item">
                                            <p class="product-tag"> 
                                                @if($lang == 'en')
                                                {{$second_off->name_en}}
                                                @else
                                                {{$second_off->name_ar}}
                                                @endif
                                            </p>
                                            <div class="prod-img">
                                                <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="offer image">
                                                <div class="hover-prod-btn">
                                                    <ul>
                                                        <li><a  href="javascript:;" onclick="add_to_cart({{$product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                                        <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-brand">
                                                @if($lang == 'en')
                                                {{$product->name_en}}
                                                @else
                                                {{$product->name_ar}}
                                                @endif
                                            </div>
                                            <div class="prod-name">
                                                <p>
                                                    @if($lang == 'en')
                                                    {{$product->name_en}}
                                                    @else
                                                    {{$product->name_ar}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="prod-salary">
                                                <div class="row">
                                                    @if($product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$product->original_price}} {{trans('lang.SR')}} </div>@endif
                                                    <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$product->discount_price}} {{trans('lang.SR')}}</div>
                                                </div>
                                            </div>
                                            <div class="prod-btns">
                                                @if($product->original_price != 0)
                                                <span class="saved-btn">
                                                    <?php
                                                    $save_price = ($product->original_price - $product->discount_price);
                                                    $percent_price = number_format((($product->original_price - $product->discount_price) / ($product->original_price)) * 100);
                                                    ?>
                                                    <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                                </span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="part-con">
                                <div id="owl-demo-4">
                                    @foreach($third_offers as $row)
                                    <?php
                                    $product = \App\Product::find($row->product_id);
                                    $offer_id = $row->offer_id;
                                    ?>
                                    <div class="prod-item">
                                        <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id }}" class="item">
                                            <p class="product-tag"> 
                                                @if($lang == 'en')
                                                {{$third_off->name_en}}
                                                @else
                                                {{$third_off->name_ar}}
                                                @endif
                                            </p>
                                            <div class="prod-img">
                                                <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="offer image">
                                                <div class="hover-prod-btn">
                                                    <ul>
                                                        <li><a  href="javascript:;" onclick="add_to_cart({{$product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                                        <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-brand">
                                                @if($lang == 'en')
                                                {{$product->name_en}}
                                                @else
                                                {{$product->name_ar}}
                                                @endif
                                            </div>
                                            <div class="prod-name">
                                                <p>
                                                    @if($lang == 'en')
                                                    {{$product->name_en}}
                                                    @else
                                                    {{$product->name_ar}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="prod-salary">
                                                <div class="row">
                                                    @if($product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$product->original_price}} {{trans('lang.SR')}} </div>@endif
                                                    <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$product->discount_price}} {{trans('lang.SR')}}</div>
                                                </div>
                                            </div>
                                            <div class="prod-btns">
                                                @if($product->original_price != 0)
                                                <span class="saved-btn">
                                                    <?php
                                                    $save_price = ($product->original_price - $product->discount_price);
                                                    $percent_price = number_format((($product->original_price - $product->discount_price) / ($product->original_price)) * 100);
                                                    ?>
                                                    <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                                </span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="partion">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6"><a href="{{\App\Ads_offer::first()->first_link}}" class="offer-banner-2"><img src="{{URL::to('/').'/images/ads_offers/'.\App\Ads_offer::first()->first_ads}}" alt="image offer"></a></div>
                    <div class="col-sm-6"><a href="{{\App\Ads_offer::first()->second_link}}" class="offer-banner-2"><img src="{{URL::to('/').'/images/ads_offers/'.\App\Ads_offer::first()->second_ads}}" alt="image offer"></a></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl text-center">
                    <h2> {{trans('lang.best_deals')}}</h2>
                </div>
                <div class="part-con">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-prod">
                                        <div class="box-prod-img">
                                            <a href="{{\App\Best_offer::first()->first_link}}">
                                                <img src="{{URL::to('/').'/images/best_offers/'.\App\Best_offer::first()->first_img}}"  class="img-responsive"  style="height: 180px;margin: auto; width: 100%" alt="box product image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box-prod">
                                        <div>
                                            <a href="{{\App\Best_offer::first()->second_link}}">
                                                <img src="{{URL::to('/').'/images/best_offers/'.\App\Best_offer::first()->second_img}}" class="img-responsive" style="height: 180px;margin: auto;" alt="box product image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 pull-right col-xs-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-prod">
                                        <div class="box-prod-img">
                                            <a href="{{\App\Best_offer::first()->third_link}}">
                                                <img src="{{URL::to('/').'/images/best_offers/'.\App\Best_offer::first()->third_img}}" class="img-responsive"  style="height: 180px;margin: auto;" alt="box product image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box-prod">
                                        <div class="box-prod-img">
                                            <a href="{{\App\Best_offer::first()->fourth_link}}">
                                                <img src="{{URL::to('/').'/images/best_offers/'.\App\Best_offer::first()->fourth_img}}" class="img-responsive"  style="height: 180px;margin: auto;" alt="box product image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="box-prod-banner">
                                <a href="{{\App\Best_offer::first()->main_link}}">
                                    <img src="{{URL::to('/').'/images/best_offers/'.\App\Best_offer::first()->main_img}}" alt="img banner">
                                </a>
                            </div>
                        </div>
                        <div class="clearfix visible-sm visible-xs"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="partion">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6"><a href="{{\App\Ads_offer::first()->third_link}}" class="offer-banner-2"><img src="{{URL::to('/').'/images/ads_offers/'.\App\Ads_offer::first()->third_ads}}" alt="image offer"></a></div>
                    <div class="col-sm-6"><a href="{{\App\Ads_offer::first()->fourth_link}}" class="offer-banner-2"><img src="{{URL::to('/').'/images/ads_offers/'.\App\Ads_offer::first()->fourth_ads}}" alt="image offer"></a></div>
                </div>
            </div>
        </div>
    </section>

<!--    <section>
    <div class="partion">
        <div class="container">
            <div class="part-hd dir-rtl">
                <h2>رياضة و لياقة بدنية</h2>
                <a href="#" class="view-all"> إظهار الكل <i class="fa fa-angle-double-left fa-lg"></i></a>
            </div>
            <div class="part-con">
                <div class="row">
                    <div class="col-md-6 col-sm-12 pull-right">
                        <div class="box-prod-banner">
                            <a href="#">
                                <img src="assets/img/products/img-(43).png" alt="img banner">
                            </a>
                        </div>
                    </div>
                    <div class="clearfix visible-sm visible-xs"></div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-prod">
                                    <div class="discount">خصم 15%</div>
                                    <div class="box-prod-img">
                                        <img src="assets/img/products/img-(27).jpg" alt="box product image">
                                    </div>
                                    <div class="box-prod-name">
                                        <p>أطقم لحاف فاخر 4 قطع مقاس مفرد</p>
                                    </div>
                                    <div class="box-prod-btns">
                                        <a href="#" class="box-btn-buy"><i class="fa fa-shopping-cart"></i> تسوق الآن </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-prod">
                                    <div class="discount">خصم 15%</div>
                                    <div class="box-prod-img">
                                        <img src="assets/img/products/img-(37).jpg" alt="box product image">
                                    </div>
                                    <div class="box-prod-name">
                                        <p>أطقم لحاف فاخر 4 قطع مقاس مفرد</p>
                                    </div>
                                    <div class="box-prod-btns">
                                        <a href="#" class="box-btn-buy"><i class="fa fa-shopping-cart"></i> تسوق الآن </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-prod">
                                    <div class="discount">خصم 15%</div>
                                    <div class="box-prod-img">
                                        <img src="assets/img/products/img-(33).jpg" alt="box product image">
                                    </div>
                                    <div class="box-prod-name">
                                        <p>أطقم لحاف فاخر 4 قطع مقاس مفرد</p>
                                    </div>
                                    <div class="box-prod-btns">
                                        <a href="#" class="box-btn-buy"><i class="fa fa-shopping-cart"></i> تسوق الآن </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-prod">
                                    <div class="discount">خصم 15%</div>
                                    <div class="box-prod-img">
                                        <img src="assets/img/products/img-(27).jpg" alt="box product image">
                                    </div>
                                    <div class="box-prod-name">
                                        <p>أطقم لحاف فاخر 4 قطع مقاس مفرد</p>
                                    </div>
                                    <div class="box-prod-btns">
                                        <a href="#" class="box-btn-buy"><i class="fa fa-shopping-cart"></i> تسوق الآن </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

</section>

@stop