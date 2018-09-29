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
                                    <div class="width-80" >
                                        <img id="zoom_03"   src="assets/img/products/img-(24).jpg"  data-zoom-image="assets/img/products/img-(24).jpg"/>
                                    </div>
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
                                            <div class="col-md-12 col-xs-12  text-muted"> <span id="original_price_modal"> {{trans('lang.SR')}}</span></div>
                                            <div class="col-md-12 col-xs-12" >{{trans('lang.now')}} <span id="discount_price_modal"> </span> {{trans('lang.SR')}} <span class="saved-btn" id="saved"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>{{trans('lang.product_reviews')}}</h5>
                                    <div class="info-txt-part-con">
                                        <ul class="users-stars">
                                            <div id="stars_model">
                                            </div>
                                            <li><a href="#" class="text-muted">(<span id="rate_number_modal"></span> {{trans('lang.rate')}})</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <div class="finish-list-a">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="javascript:;"  id="buy_now_modal" class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.buy_now')}} </a></div>
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
                <div class="col-md-8 col-sm-12 head-slider pull-right">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php for ($i = 0; $i < count($sliders); $i++) { ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>
                            <?php } ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
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
                <div class="clearfix visible-sm visible-xs"></div>
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="adv-images">
                                <?php $first_ads = \App\Ad::first(); ?>
                                <a href="{{$first_ads->link}}"><img src="{{URL::to('/images/ads').'/'.$first_ads->image}}" alt="adv images"></a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="adv-images">
                                <?php $second_ads = \App\Ad::skip(1)->first(); ?>
                                <a href="{{$second_ads->link}}"><img src="{{URL::to('/images/ads').'/'.$second_ads->image}}" alt="adv images"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($first_section)
    <section>
        <div class="partion">
            <div class="container">
                <!-- Get Section Data -->
                <div class="part-hd dir-rtl">
                    @if($lang == 'en')
                    <h2>{{$first_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $first_section->id .'/'.str_replace_me($first_section->name_en)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @else
                    <h2>{{$first_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $first_section->id .'/'.str_replace_me($first_section->name_ar)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif
                </div>
                <!-- Get Product Data -->
                <div class="part-con">
                    <div id="owl-demo">
                        @foreach($first_products as $f_product)
                        <?php
                        $offer = \App\Product_offers::where('product_id', $f_product->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="item">
                            <div class="prod-item">
                                <a href="{{URL::to('/').'/'.$lang.'/product/'.$f_product->id}}" class="item">
                                    @if(isset($offer_id) && $offer_id !=0)
                                    <p class="product-tag">
                                        @if($lang == 'en')
                                        {{\App\Offer::find($offer_id)->name_en}}
                                        @else
                                        {{\App\Offer::find($offer_id)->name_ar}}
                                        @endif
                                    </p>
                                    @endif
                                    <div class="prod-img">
                                        <img src="{{URL::to('/images/products/meduim') . '/' . $f_product->image}}" alt="offer image">
                                        <div class="hover-prod-btn">
                                            <ul>
                                                <li><a  href="javascript:;" onclick="add_to_cart({{$f_product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                                <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$f_product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-brand">
                                        @if($lang == 'en')
                                        {{$f_product->getBrand->name_en}}
                                        @else
                                        {{$f_product->getBrand->name_ar}}
                                        @endif
                                    </div>
                                    <div class="prod-name">
                                        @if($lang == 'en')
                                        <p>{{$f_product->name_en}}</p>
                                        @else
                                        <p>{{$f_product->name_ar}}</p>
                                        @endif
                                    </div>
                                    <div class="prod-salary">
                                        <div class="row">
                                            @if($f_product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$f_product->original_price}} {{trans('lang.SR')}} </div>@endif
                                            <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$f_product->discount_price}} {{trans('lang.SR')}}</div>
                                        </div>
                                    </div>
                                    <div class="prod-btns">
                                        @if($f_product->original_price != 0)
                                        <span class="saved-btn">
                                            <?php
                                            $save_price = ($f_product->original_price - $f_product->discount_price);
                                            $percent_price = number_format((($f_product->original_price - $f_product->discount_price) / ($f_product->original_price)) * 100);
                                            ?>
                                            <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                        </span>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($second_section)
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    @if($lang == 'en')
                    <h2>{{$second_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $second_section->id .'/'. str_replace_me($second_section->name_en)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @else
                    <h2>{{$second_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $second_section->id .'/'.str_replace_me($second_section->name_ar)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif
                </div>
                <div class="part-con">
                    <div id="owl-demo-2">
                        @foreach($second_products as $s_product)
                        <?php
                        $offer = \App\Product_offers::where('product_id', $s_product->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$s_product->id}}" class="item">
                                @if(isset($offer_id) && $offer_id !=0)
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{\App\Offer::find($offer_id)->name_en}}
                                    @else
                                    {{\App\Offer::find($offer_id)->name_ar}}
                                    @endif
                                </p>
                                @endif
                                <div class="prod-img">

                                    <img src="{{URL::to('/images/products/meduim') . '/' . $s_product->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a  href="javascript:;" onclick="add_to_cart({{$s_product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                            <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$s_product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-brand"> 
                                    @if($lang == 'en')
                                    {{$s_product->getBrand->name_en}}
                                    @else
                                    {{$s_product->getBrand->name_ar}}
                                    @endif
                                </div>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{$s_product->name_en}}</p>
                                    @else
                                    <p>{{$s_product->name_ar}}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        @if($s_product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$s_product->original_price}} {{trans('lang.SR')}} </div>@endif
                                        <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$s_product->discount_price}} {{trans('lang.SR')}}</div>
                                    </div>
                                </div>
                                <div class="prod-btns">
                                    @if($s_product->original_price != 0)
                                    <span class="saved-btn">
                                        <?php
                                        $save_price = ($s_product->original_price - $s_product->discount_price);
                                        $percent_price = number_format((($s_product->original_price - $s_product->discount_price) / ($s_product->original_price)) * 100);
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
    </section>
    @endif
    @if($third_section)
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    <!-- Get Section Data -->
                    @if($lang == 'en')
                    <h2>{{$third_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $third_section->id .'/'. str_replace_me($third_section->name_en)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @else
                    <h2>{{$third_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $third_section->id .'/'. str_replace_me($third_section->name_ar)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif
                </div>
                <div class="part-con">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 pull-right">
                            <div class="box-prod-banner">
                                <?php $third_ads = \App\Ad::skip(2)->first(); ?>
                                <a href="{{$third_ads->link}}"><img src="{{URL::to('/images/ads').'/'.$third_ads->image}}" alt="adv images"></a>
                            </div>
                        </div>
                        <div class="clearfix visible-sm visible-xs"></div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                @foreach($third_products as $th_product)
                                <div class="col-sm-6">
                                    <div class="box-prod">
                                        <!--                                        <div class="discount">خصم 15%</div>-->
                                        <a href="{{URL::to('/').'/'.$lang.'/product/'.$th_product->id }}">
                                            <div class="box-prod-img">
                                                <img  src="{{URL::to('/images/products/meduim') . '/' . $th_product->image}}" alt="{{$th_product->name_ar}}">
                                            </div>
                                        </a>
                                        <div class="box-prod-name">
                                            @if($lang == 'en')
                                            <p>{{ str_limit($th_product->name_en, 50) }}</p>
                                            @else
                                            <p>{{ str_limit($th_product->name_ar, 50) }}</p>
                                            @endif
                                        </div>
                                        <div class="box-prod-btns">
                                            <a href="javascript:;" onclick="add_to_cart({{$th_product->id}})" class="box-btn-buy"><i class="fa fa-shopping-cart"></i>  {{trans('lang.add_to_cart')}}  </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($fourth_section)
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    @if($lang == 'en')
                    <h2>{{$fourth_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $fourth_section->id . '/' . str_replace_me($fourth_section->name_en)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @else
                    <h2>{{$fourth_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $fourth_section->id . '/' . str_replace_me($fourth_section->name_ar)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif
                </div>
                <div class="part-con">
                    <div id="owl-demo-3">
                        @foreach($fourth_products as $fo_product)
                        <?php
                        $offer = \App\Product_offers::where('product_id', $fo_product->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$fo_product->id}}" class="item">
                                @if(isset($offer_id) && $offer_id !=0)
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{\App\Offer::find($offer_id)->name_en}}
                                    @else
                                    {{\App\Offer::find($offer_id)->name_ar}}
                                    @endif
                                </p>
                                @endif
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products/meduim') . '/' . $fo_product->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a  href="javascript:;" onclick="add_to_cart({{$fo_product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                            <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$fo_product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-brand"> 
                                    @if($lang == 'en')
                                    {{$fo_product->getBrand->name_en}}
                                    @else
                                    {{$fo_product->getBrand->name_ar}}
                                    @endif
                                </div>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{$fo_product->name_en}}</p>
                                    @else
                                    <p>{{$fo_product->name_ar}}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        @if($fo_product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$fo_product->original_price}} {{trans('lang.SR')}} </div>@endif
                                        <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$fo_product->discount_price}} {{trans('lang.SR')}}</div>
                                    </div>
                                </div>
                                <div class="prod-btns">
                                    @if($fo_product->original_price != 0)
                                    <span class="saved-btn">
                                        <?php
                                        $save_price = ($fo_product->original_price - $fo_product->discount_price);
                                        $percent_price = number_format((($fo_product->original_price - $fo_product->discount_price) / ($fo_product->original_price)) * 100);
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
    </section>
    @endif

    @if($five_section)
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    @if($lang == 'en')
                    <h2>{{$five_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $five_section->id . '/' . str_replace_me($five_section->name_en)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>                    @else
                    <h2>{{$five_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $five_section->id . '/' . str_replace_me($five_section->name_ar)}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif
                </div>
                <div class="part-con">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 pull-right">
                            <div class="box-prod-banner">
                                <?php $fourth_ads = \App\Ad::skip(3)->first(); ?>
                                <a href="{{$fourth_ads->link}}"><img src="{{URL::to('/images/ads').'/'.$fourth_ads->image}}" alt="img banner"></a>
                            </div>
                        </div>
                        <div class="clearfix visible-sm visible-xs"></div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                @foreach($five_products as $fi_product)
                                <div class="col-sm-6">
                                    <div class="box-prod">
                                        <!--                                        <div class="discount">خصم 15%</div>-->
                                        <a href="{{URL::to('/').'/'.$lang.'/product/'.$fi_product->id }}">
                                            <div class="box-prod-img">
                                                <img  src="{{URL::to('/images/products/meduim') . '/' . $fi_product->image}}" alt="{{$fi_product->name_ar}}" >
                                            </div>
                                        </a>
                                        <div class="box-prod-name">
                                            @if($lang == 'en')
                                            <p>{{ str_limit($fi_product->name_en, 50) }}</p>
                                            @else
                                            <p>{{ str_limit($fi_product->name_ar, 50) }}</p>
                                            @endif
                                        </div>
                                        <div class="box-prod-btns">
                                            <a href="javascript:;" onclick="add_to_cart({{$fi_product->id}})" class="box-btn-buy"><i class="fa fa-shopping-cart"></i>  {{trans('lang.add_to_cart')}}  </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(isset($six_section) &&  !empty($six_section))
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    @if($lang == 'en')
                    <h2>{{$six_section->name_en}}</h2>
                    <a href="{{URL::to('/en/section').'/' . $six_section->id .'/' . str_replace_me($six_section->name_en)}}" title="{{$six_section->name_en}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @else
                    <h2>{{$six_section->name_ar}}</h2>
                    <a href="{{URL::to('/ar/section').'/' . $six_section->id .'/' . str_replace_me($six_section->name_ar)}}" title="{{$six_section->name_ar}}" class="view-all"> {{trans('lang.show_all')}}  <i class="fa fa-angle-double-left fa-lg"></i></a>
                    @endif

                </div>
                <div class="part-con">
                    <div id="owl-demo-6">
                        @foreach($six_products as $si_product)
                        <?php
                        $offer = \App\Product_offers::where('product_id', $si_product->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$si_product->id}}" class="item">
                                @if(isset($offer_id) && $offer_id !=0)
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{\App\Offer::find($offer_id)->name_en}}
                                    @else
                                    {{\App\Offer::find($offer_id)->name_ar}}
                                    @endif
                                </p>
                                @endif
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products/meduim') . '/' . $si_product->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a  href="javascript:;" onclick="add_to_cart({{$si_product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                            <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$si_product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-brand">
                                    @if($lang == 'en')
                                    {{$si_product->getBrand->name_en}}
                                    @else
                                    {{$si_product->getBrand->name_ar}}
                                    @endif
                                </div>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{$si_product->name_en}}</p>
                                    @else
                                    <p>{{$si_product->name_ar}}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        @if($si_product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$si_product->original_price}} {{trans('lang.SR')}} </div>@endif
                                        <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$si_product->discount_price}} {{trans('lang.SR')}}</div>
                                    </div>
                                </div>
                                <div class="prod-btns">
                                    @if($si_product->original_price != 0)
                                    <span class="saved-btn">
                                        <?php
                                        $save_price = ($si_product->original_price - $si_product->discount_price);
                                        $percent_price = number_format((($si_product->original_price - $si_product->discount_price) / ($si_product->original_price)) * 100);
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
    </section>
    @endif


    <!--  Product Similar Seen -->
    @if(isset($similar_product_view))
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    <h2> {{trans('lang.similar_products_seen')}}</h2>
                </div>
                <div class="part-con">
                    <div id="owl-demo-4">
                        @foreach($similar_product_view as $row)
                        <?php
                        $offer = \App\Product_offers::where('product_id', $row->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$row->id}}" class="item">
                                @if(isset($offer_id) && $offer_id !=0)
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{\App\Offer::find($offer_id)->name_en}}
                                    @else
                                    {{\App\Offer::find($offer_id)->name_ar}}
                                    @endif
                                </p>
                                @endif
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products/meduim') . '/' . $row->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a  href="javascript:;" onclick="add_to_cart({{$row->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                            <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$row->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-brand"> 
                                    @if($lang == 'en')
                                    {{$row->getBrand->name_en}}
                                    @else
                                    {{$row->getBrand->name_ar}}
                                    @endif
                                </div>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{$row->name_en}}</p>
                                    @else
                                    <p>{{$row->name_ar}}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        @if($row->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$row->original_price}} {{trans('lang.SR')}} </div>@endif
                                        <div class="col-md-12 col-xs-12"> {{trans('lang.now')}} {{$row->discount_price}} {{trans('lang.SR')}}</div>
                                    </div>
                                </div>
                                <div class="prod-btns">
                                    @if($row->original_price != 0)
                                    <span class="saved-btn">
                                        <?php
                                        $save_price = ($row->original_price - $row->discount_price);
                                        $percent_price = number_format((($row->original_price - $row->discount_price) / ($row->original_price)) * 100);
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
    </section>
    @endif

    <!--  Product Recently Watched -->
    @if(isset($product_view))
    <section>
        <div class="partion">
            <div class="container">
                <div class="part-hd dir-rtl">
                    <h2>{{trans('lang.recently_watched')}}</h2>
                </div>
                <div class="part-con">
                    <div id="owl-demo-5">
                        @foreach($product_view as $row)
                        <?php
                        $product = \App\Product::find($row->product_id);
                        $offer = \App\Product_offers::where('product_id', $row->product_id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}" class="item">
                                @if(isset($offer_id) && $offer_id !=0)
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{\App\Offer::find($offer_id)->name_en}}
                                    @else
                                    {{\App\Offer::find($offer_id)->name_ar}}
                                    @endif
                                </p>
                                @endif
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products/meduim') . '/' . $product->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a  href="javascript:;" onclick="add_to_cart({{$product->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                            <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$product->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                          
                                <div class="product-brand"> 
                                    @if($lang == 'en')
                                    {{$product->getBrand->name_en}}
                                    @else
                                    {{$product->getBrand->name_ar}}
                                    @endif
                                </div>
                                      
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{$product->name_en}}</p>
                                    @else
                                    <p>{{$product->name_ar}}</p>
                                    @endif
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
    </section>
    @endif
</section>
@stop