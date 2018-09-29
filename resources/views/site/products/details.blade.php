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
                                    <div class="width-80">
                                        <img id="zoom_04"  src="#"  data-zoom-image="#"/>     
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
                                            <div class="col-md-12 col-xs-12  text-muted"> 
                                                <span id="original_price_modal"> </span> {{trans('lang.SR')}}
                                            </div>
                                            <div class="col-md-12 col-xs-12" >
                                                {{trans('lang.now')}} <span id="discount_price_modal"> </span> {{trans('lang.SR')}}
                                                <span class="saved-btn" id="saved">  </span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>{{trans('lang.product_reviews')}}</h5>
                                    <div class="info-txt-part-con">
                                        <ul class="users-stars">
                                            @if($product_rate_count == 0)
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>0.0</strong></li>
                                            @elseif($product_rate_count < 2000)
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>1.0</strong></li>
                                            @elseif($product_rate_count > 2000 && $product_rate_count < 4000 )
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>2.0</strong></li>
                                            @elseif($product_rate_count > 4000 && $product_rate_count < 6000 )
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>3.0</strong></li>
                                            @elseif($product_rate_count > 6000 && $product_rate_count < 8000 )
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><strong>4.0</strong></li>
                                            @elseif($product_rate_count > 8000 && $product_rate_count <= 10000 )
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><strong>5.0</strong></li>
                                            @endif
                                            <li>(<span>{{$product_rate_count}}</span> {{trans('lang.rate')}})</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-txt-part">
                                    <div class="finish-list-a">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="{{URL::to('/').'/buy_now/'.$product->id}}"  class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.buy_now')}} </a></div>
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
<section id="main-product">
    <div class="container">
        <div class="main-product-partion">
            <div class="main-product-info dir-rtl">
                <div class="row">
                    <div class="col-md-4 col-sm-6">


                        <div class="product-info-img" >
                            <div class="width-80">

                                @if(isset($color_size_data))
                                <img id="zoom_03" src="{{URL::to('/').'/images/products/'.$color_size_data->image}}" data-zoom-image="{{URL::to('/').'/images/products/'.$color_size_data->image}}"/>
                                @else
                                <img id="zoom_03" src="{{URL::to('/').'/images/products/'.$product->image}}" data-zoom-image="{{URL::to('/').'/images/products/'.$product->image}}"/>
                                @endif
                            </div>
                            <div id="gallery_01">
                                @if(isset($color_size_data))
                                @if(count($product_color_images) > 0)
                                <a  href="#" class="elevatezoom-gallery " data-update="" data-image="{{URL::to('/').'/images/products/'.$color_size_data->image}}" data-zoom-image="{{URL::to('/').'/images/products/'.$color_size_data->image}}">
                                    <img src="{{URL::to('/').'/images/products/'.$color_size_data->image}}" alt="product images "/>
                                </a>
                                @foreach($product_color_images as $row)
                                <a  href="#" class="elevatezoom-gallery " data-update="" data-image="{{URL::to('/images/products/').'/'.$row->image}}" data-zoom-image="{{URL::to('/images/products/').'/'.$row->image}}">
                                    <img src="{{URL::to('/images/products/').'/'.$row->image}}" alt="product images "/>
                                </a>
                                @endforeach
                                @endif
                                @else
                                @if(count($product_images) > 0)
                                <a  href="#" class="elevatezoom-gallery active" data-update="" data-image="{{URL::to('/').'/images/products/'.$product->image}}" data-zoom-image="{{URL::to('/').'/images/products/'.$product->image}}">
                                    <img src="{{URL::to('/').'/images/products/'.$product->image}}" alt="product images "/>
                                </a>
                                @foreach($product_images as $row)
                                <a  href="#" class="elevatezoom-gallery " data-update="" data-image="{{URL::to('/images/products/').'/'.$row->image}}" data-zoom-image="{{URL::to('/images/products/').'/'.$row->image}}">
                                    <img src="{{URL::to('/images/products/').'/'.$row->image}}" alt="product images "/>
                                </a>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="info-txt-part">
                            <h2><strong>
                                    @if($lang == 'en')
                                    {{$product->getBrand->name_en}}
                                    @else
                                    {{$product->getBrand->name_ar}}
                                    @endif
                                </strong></h2>
                            <h4>
                                @if($lang == 'en')
                                @if(isset($color_size_data))
                                {{$color_size_data->name_en}}
                                @else
                                {{$product->name_en}}
                                @endif
                                @else
                                @if(isset($color_size_data))
                                {{$color_size_data->name_ar}}
                                @else
                                {{$product->name_ar}}
                                @endif
                                @endif
                            </h4>
                        </div>
                        <div class="info-txt-part">
                            @if($product_offer)
                            <p class="product-tag">
                                @if($lang == 'en')
                                {{\App\Offer::find($product_offer->offer_id)->name_en}}
                                @else
                                {{\App\Offer::find($product_offer->offer_id)->name_ar}}
                                @endif
                            </p>
                            @endif
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>{{trans('lang.price')}}</h5>

                            <div class="prod-salary">
                                @if(isset($color_size_data))
                                <div class="row">
                                    @if($color_size_data->original_price != 0)<div class="col-md-12 col-xs-12  text-muted"> {{$color_size_data->original_price}} {{trans('lang.SR')}} </div>@endif
                                    <div class="col-md-12 col-xs-12"> 
                                        {{trans('lang.now')}}{{$color_size_data->discount_price}} {{trans('lang.SR')}}
                                        @if($color_size_data->original_price != 0)
                                        <?php
                                        $save_price = ($color_size_data->original_price - $color_size_data->discount_price);
                                        $percent_price = number_format((($color_size_data->original_price - $color_size_data->discount_price) / ($color_size_data->original_price)) * 100);
                                        ?>
                                        <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                        @endif
                                    </div>
                                </div>

                                @else
                                <div class="row">
                                    @if($product->original_price != 0)<div class="col-md-12 col-xs-12  text-muted"> {{$product->original_price}} {{trans('lang.SR')}} </div>@endif
                                    <div class="col-md-12 col-xs-12"> 
                                        {{trans('lang.now')}}{{$product->discount_price}} {{trans('lang.SR')}}
                                        @if($product->original_price != 0)
                                        <?php
                                        $save_price = ($product->original_price - $product->discount_price);
                                        $percent_price = number_format((($product->original_price - $product->discount_price) / ($product->original_price)) * 100);
                                        ?>
                                        <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                        @endif
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>{{trans('lang.product_reviews')}}</h5>
                            <div class="info-txt-part-con">
                                <ul class="users-stars">
                                    @if($product_rate_count == 0)
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>0.0</strong></li>
                                    @elseif($product_rate_count < 2000)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>1.0</strong></li>
                                    @elseif($product_rate_count > 2000 && $product_rate_count < 4000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>2.0</strong></li>
                                    @elseif($product_rate_count > 4000 && $product_rate_count < 6000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>3.0</strong></li>
                                    @elseif($product_rate_count > 6000 && $product_rate_count < 8000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>4.0</strong></li>
                                    @elseif($product_rate_count > 8000 && $product_rate_count <= 10000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><strong>5.0</strong></li>
                                    @endif
                                    <li>(<span>{{$product_rate_count}}</span> {{trans('lang.rate')}})</li>
                                </ul>
                            </div>
                        </div>
                        @if(count($product_colors_sizes) > 0)

                        @if($product->color_id != 0)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>{{trans('lang.color')}}</h5>
                            <div class="prod-salary">
                                <div class="row">
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}"  class="<?php
                                    if (isset($_GET['color_size'])) {
                                        echo 'btn btn-success';
                                    } else {
                                        echo 'btn btn-warning';
                                    }
                                    ?>">
                                        @if($lang == 'en')
                                        {{$product->getColor->name_en}}
                                        @else
                                        {{$product->getColor->name_ar}}
                                        @endif
                                    </a>
                                    @foreach($product_colors_sizes as $color)
                                    @if($color->color_id != $product->color_id)
                                    <?php
                                    if (isset($_GET['color_size'])) {
                                        $color_id = \App\Product_colors_size::find($_GET['color_size'])->color_id;
                                    }
                                    ?>
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id.'?color_size='.$color->id}}"  class="<?php
                                    if (isset($color_id) && $color_id == $color->color_id) {
                                        echo 'btn btn-warning';
                                    } else {
                                        echo 'btn btn-success';
                                    }
                                    ?>">
                                        @if($lang == 'en')
                                        {{\App\Color::find($color->color_id)->name_en}}
                                        @else
                                        {{\App\Color::find($color->color_id)->name_ar}}
                                        @endif
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($product->size_id != 0)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>{{trans('lang.size')}}</h5>
                            <div class="prod-salary">
                                <div class="row">
                                    <?php
                                    if (isset($_GET['color_size'])) {
                                        $size_id = \App\Product_colors_size::find($_GET['color_size'])->size_id;
                                    }
                                    ?>
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}"  class="<?php
                                    if (isset($size_id)) {
                                        if ($size_id == $product->size_id) {
                                            echo 'btn btn-warning';
                                        } else {
                                            echo 'btn btn-success';
                                        }
                                    } else {
                                        echo 'btn btn-warning';
                                    }
                                    ?>">
                                        {{$product->getSize->name}}
                                    </a>
                                    @foreach($product_colors_sizes as $size)
                                    @if($size->size_id != 0 && $size->size_id != $product->size_id)
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id.'?color_size='.$size->id}}"  class="<?php
                                    if (isset($size_id) && $size_id == $size->size_id) {
                                        echo 'btn btn-warning';
                                    } else {
                                        echo 'btn btn-success';
                                    }
                                    ?>">
                                        {{\App\Size::find($size->size_id)->name}}
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="info-txt-part">
                            <div class="finish-list-a">
                                <div class="row">
                                    @if(isset($_GET['color_size'])) 
                                    <div class="col-md-6 col-xs-6"><a href="{{URL::to('/').'/buy_now/'.$product->id.'/'.$_GET['color_size']}}"  class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.buy_now')}} </a></div>
                                    <div class="col-md-6 col-xs-6"><a  href="javascript:;" onclick="add_to_colors_cart({{$product->id}} , {{$_GET['color_size']}})" class="bask-link-gray"><i class="fa fa-shopping-cart"></i> {{trans('lang.add_to_cart')}} </a></div>
                                    @else
                                    <div class="col-md-6 col-xs-6"><a href="{{URL::to('/').'/buy_now/'.$product->id}}"  class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.buy_now')}} </a></div>
                                    <div class="col-md-6 col-xs-6"><a  href="javascript:;" onclick="add_to_cart({{$product->id}})" class="bask-link-gray"><i class="fa fa-shopping-cart"></i> {{trans('lang.add_to_cart')}} </a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-building"></i>{{trans('lang.seller')}}</h5>
                            <div class="info-txt-part-con">
                                @if($product->seller_id)
                                @if($lang == 'en')
                                <p>{{$product->getSeller->trade_name_en}}</p>
                                @else
                                <p>{{$product->getSeller->trade_name}}</p>
                                @endif
                                @endif
                            </div>
                        </div>
                        @if(count($product_sellers) > 0)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-users"></i>{{trans('lang.other_seller')}}</h5>
                            <div class="info-txt-part-con">
                                <p>{{trans('lang.weHave')}} {{count($product_sellers)}} {{trans('lang.other_seller')}}  </p>
                                <a href="#sellers" class="btn-saler">{{count($product_sellers)}}  {{trans('lang.other_seller')}}<i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                        @endif
                        @if($product->duration_charging || $product->duration_delivery)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-truck"></i>{{trans('lang.fast_delivery')}}</h5>
                            <div class="info-txt-part-con">
                                @if($product->duration_charging)
                                <p>{{trans('lang.shippingAt')}} {{$product->duration_charging}} {{trans('lang.days')}}</p>
                                @endif
                                @if($product->duration_delivery)
                                <p>{{trans('lang.deliveryWithIn')}} {{$product->duration_delivery}} {{trans('lang.days')}}</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-hand-paper-o"></i>{{trans('lang.malky_promise')}}</h5>
                            <div class="info-txt-part-con">
                                @if($lang == 'en')
                                <ul>
                                    <li>14 day Replacement Guarantee</li>
                                    <li>100% Secure Payments</li>
                                    <li>100 % Authentic</li>
                                </ul>
                                @else
                                <ul>
                                    <li>ضمان الاستبدال خلال 14 يوم</li>
                                    <li>100 % دفع آمن</li>
                                    <li>100 % أصلي</li>
                                </ul>
                                @endif                                
                            </div>
                        </div>
                        @if($product_offer)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-tags"></i>{{trans('lang.offers')}}</h5>
                            <div class="info-txt-part-con">
                                <p>
                                    @if($lang == 'en')
                                    {{$product_offer->title_en}}
                                    @else
                                    {{$product_offer->title_ar}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @endif
                        @if($product->payment_on_delivery == 1)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>{{trans('lang.cash_on_delivery')}}</h5>
                            <div class="info-txt-part-con">
                                <p>{{trans('lang.cash_on_delivery_msg')}}</p>
                            </div>
                        </div>
                        @endif
                        @if($product->guarantee)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-thumbs-up"></i>{{trans('lang.guarantee')}}</h5>
                            <div class="info-txt-part-con">
                                <p>{{$product->guarantee}}</p>
                            </div>
                        </div>
                        @endif
                        @if($product->gift_wrapping == 1)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-gift"></i>{{trans('lang.gift_wrap')}}</h5>
                        </div>
                        @endif
                        @if($product->free_charge)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>{{trans('lang.free_shipping')}}</h5>
                            <div class="info-txt-part-con">
                                <p>
                                    {{trans('lang.free_shipping_msg')}}
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>

        @if(count($product_sellers) > 0)

        <div class="main-product-partion dir-rtl" id="sellers">
            <h2 class="product-partion-header">{{trans('lang.other_seller')}} ({{count($product_sellers)}})</h2>
            <p class="prod-txt-center">                                
                @if($lang == 'en')
                {{$product->name_en}}
                @else
                {{$product->name_ar}}
                @endif
            </p>
            <div class="product-partion-con">
                <table class="table table-hover prod-table table-responsive">
                    <thead>
                        <tr>
                            <th>{{trans('lang.seller')}}</th>
<!--                            <th class="hidden-xs">التقييم</th>-->
                            <th>{{trans('lang.guarantee')}}</th>
                            <th class="hidden-xs">{{trans('lang.delivery')}}</th>
                            <th>{{trans('lang.price')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product_sellers as $row)
                        <tr>
                            <td>
                                <strong>
                                    @if($lang == 'en')
                                    {{$row->getSeller->trade_name_en}}
                                    @else
                                    {{$row->getSeller->trade_name}}
                                    @endif
                                </strong>
                            </td>
<!--                            <td class="hidden-xs"><div class="btn-saler">4.0 / 5 <i class="fa fa-star"></i></div></td>-->
                            <td>
                                @if($lang == 'en')
                                {{$row->guarantee_en}}
                                @else
                                {{$row->guarantee}}
                                @endif
                            </td>
                            <td class="hidden-xs">
                                <p>
                                    @if($lang == 'en')
                                    {{$row->delivery_en}}
                                    @else
                                    {{$row->delivery}}
                                    @endif
                                </p>
                            </td>
                            <td><a href="javascript:;"  onclick="add_to_seller_cart({{$product->id}} , {{$row->seller_id}})" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {{$row->price}} {{trans('lang.SR')}} </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.product_info')}}</h2>
            @if($lang == 'en')
            <p class="prod-txt-center">{{$product->name_en}}</p>
            @else
            <p class="prod-txt-center dir-rtl">{{$product->name_ar}}</p>
            @endif
            @if($lang == 'en')
            <div class="product-partion-con">
                <p>{!!html_entity_decode($product->details_en)!!}</p>
            </div>
            @else
            <div class="product-partion-con  dir-rtl">
                <p>{!!html_entity_decode($product->details_ar)!!}</p>
            </div>
            @endif

            @if($product->video)
            <video width="700" height="350" controls style="margin-left: 25%;">
                <source src="{{URL::to('/videos/products').'/'.$product->video}}" type="video/mp4">
                <source src="{{URL::to('/videos/products').'/'.$product->video}}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif
        </div>    

        @if($product_feature_id)
        <div class="main-product-partion dir-rtl">
            <h2 class="product-partion-header"> {{trans('lang.features_specifications')}}</h2>
            <p class="prod-txt-center">
                @if($lang == 'en')
                {{$product->name_en}}
                @else
                {{$product->name_ar}}
                @endif
            </p>
            <div class="product-partion-con">
                <table class="table table-hover prod-table table-responsive">
                    @foreach($product_feature_id as $key => $val)
                    <thead>
                        <tr>
                            <?php $feature = \App\Feature::find($val); ?>
                            <th>
                                @if($lang == 'en')
                                {{$feature->name_en}}
                                @else
                                {{$feature->name_ar}}
                                @endif
                            </th>
                            <th class="hidden-xs"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $advantages = \App\Product_advantages::where(['feature_id' => $val, 'product_id' => $product->id])->get(); ?>
                        @foreach($advantages as $adv)
                        <tr>
                            <td><strong>
                                    @if($lang == 'en')
                                    {{$adv->name_en}}
                                    @else
                                    {{$adv->name_ar}}
                                    @endif
                                </strong></td>
                            <td>
                                @if($lang == 'en')
                                {{$adv->value_en}}
                                @else
                                {{$adv->value_ar}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        @endif


        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.shipping_return')}}</h2>
            <div class="product-partion-con  dir-rtl">
                @if($lang == 'en')
                {!!html_entity_decode(App\Setting::find(1)->shipping_return_en)!!}
                @else
                {!!html_entity_decode(App\Setting::find(1)->shipping_return)!!}
                @endif
            </div>
        </div>
        <div class="main-product-partion">
            <h2 class="product-partion-header"> {{trans('lang.product_reviews')}}</h2>
            <p class="prod-txt-center">
                @if($lang == 'en')
                {{$product->name_en}}
                @else
                {{$product->name}}
                @endif
            </p>
            <div class="product-partion-con dir-rtl">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-xs-9">
                                <ul class="users-stars">
                                    @if($product_rate_count == 0)
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>0.0</strong></li>
                                    @elseif($product_rate_count < 2000)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>1.0</strong></li>
                                    @elseif($product_rate_count > 2000 && $product_rate_count < 4000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>2.0</strong></li>
                                    @elseif($product_rate_count > 4000 && $product_rate_count < 6000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>3.0</strong></li>
                                    @elseif($product_rate_count > 6000 && $product_rate_count < 8000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><strong>4.0</strong></li>
                                    @elseif($product_rate_count > 8000 && $product_rate_count <= 10000 )
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><strong>5.0</strong></li>
                                    @endif
                                </ul>
                                <span class="text-muted"><small>{{$product_rate_count}}</small> {{trans('lang.rate')}}</span>
                            </div>
                            <div class="col-xs-3">
                                @if($product_rate_count == 0)
                                <h1><strong>1.0</strong></h1>
                                @elseif($product_rate_count < 2000)
                                <h1><strong>1.0</strong></h1>
                                @elseif($product_rate_count > 2000 && $product_rate_count < 4000 )
                                <h1><strong>2.0</strong></h1>
                                @elseif($product_rate_count > 4000 && $product_rate_count < 6000 )
                                <h1><strong>3.0</strong></h1>
                                @elseif($product_rate_count > 6000 && $product_rate_count < 8000 )
                                <h1><strong>4.0</strong></h1>
                                @elseif($product_rate_count > 8000 && $product_rate_count <= 10000 )
                                <h1><strong>5.0</strong></h1>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 dir-rtl">
                        <h5><strong>{{trans('lang.product_reviews')}} ({{$product_rate_count}})</strong></h5>
                        <ul class="users-rate">
                            <li>
                                <?php $five_stars = \App\Rating_product::where(['product_id' => $product->id, 'star' => 5])->count(); ?>
                                <div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">{{$five_stars}}</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$five_stars / 100}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$five_stars / 100}}%">
                                                    <span class="sr-only">{{$five_stars / 100}}% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">4 - 5 {{trans('lang.stars')}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <?php $four_stars = \App\Rating_product::where(['product_id' => $product->id, 'star' => 4])->count(); ?>
                                <div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">{{$four_stars}}</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$four_stars}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$four_stars}}%">
                                                    <span class="sr-only">{{$four_stars}}% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">3 - 4 {{trans('lang.stars')}}</div>
                                    </div>
                                </div></li>
                            <li>
                                <?php $three_stars = \App\Rating_product::where(['product_id' => $product->id, 'star' => 3])->count(); ?>
                                <div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">{{$three_stars}}</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$three_stars}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$three_stars}}%">
                                                    <span class="sr-only">{{$three_stars}}% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">2 - 3 {{trans('lang.stars')}}</div>
                                    </div>
                                </div></li>
                            <li>
                                <?php $two_stars = \App\Rating_product::where(['product_id' => $product->id, 'star' => 2])->count(); ?>
                                <div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">{{$two_stars}}</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$two_stars}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$two_stars}}%">
                                                    <span class="sr-only">{{$two_stars}}% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">1 - 2 {{trans('lang.stars')}}</div>
                                    </div>
                                </div></li>
                            <li>
                                <?php $one_stars = \App\Rating_product::where(['product_id' => $product->id, 'star' => 1])->count(); ?>
                                <div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">{{$one_stars}}</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$one_stars}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$one_stars}}%">
                                                    <span class="sr-only">{{$one_stars}}% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">0 - 1 {{trans('lang.stars')}}</div>
                                    </div>
                                </div></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p><span class="plus-sign">+</span>سريع, الموثوقية, التصميم, سهل الاستخدام, عمر بطارية طويل</p>
                        <p><span class="minus-sign">-</span>سريع, الموثوقية, التصميم, سهل الاستخدام, عمر بطارية طويل</p>
                    </div>
                </div>
            </div>
        </div>
        @if($product_rate_count > 0)
        <div class="main-product-partion dir-rtl">
            <h4 class="product-partion-header">تقييمات المستخدمين ({{$product_rate_count}})</h4>
            <div class="product-partion-con">
                <?php $rating = \App\Rating_product::where(['product_id' => $product->id])->get(); ?>

                @foreach($rating as $rate)
                <div class="users-comment">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 pull-right">
                            <img src="{{URL::to('/')}}/site_template/assets/img/user-comment.jpg" alt="user-comment" class="img-comment">
                            <ul class="users-stars">
                                @if($product_rate_count == 0)
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><strong>0.0</strong></li>
                                @elseif($product_rate_count < 2000)
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><strong>1.0</strong></li>
                                @elseif($product_rate_count > 2000 && $product_rate_count < 4000 )
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><strong>2.0</strong></li>
                                @elseif($product_rate_count > 4000 && $product_rate_count < 6000 )
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><strong>3.0</strong></li>
                                @elseif($product_rate_count > 6000 && $product_rate_count < 8000 )
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><strong>4.0</strong></li>
                                @elseif($product_rate_count > 8000 && $product_rate_count <= 10000 )
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><strong>5.0</strong></li>
                                @endif
                            </ul>
                            <p class="text-muted"><i class="fa fa-calendar" style="margin-left:5px;"></i>{{substr($rate->created_at , 0 , 10)}} </p>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h4><strong>{{$rate->rate_text}} </strong></h4>
                        </div>
                    </div> 
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.similar_products')}}</h2>
            <div class="product-partion-con">
                <div class="part-con">
                    <div id="owl-demo">
                        @foreach($similar_product as $product)
                        <?php $product_offer = \App\Product_offers::where('product_id', $product->id)->first(); ?>
                        <?php
                        if ($product_offer) {
                            $offer_id = $product_offer->offer_id;
                            $offer_data = \App\Offer::find($offer_id);
                        } else {
                            $offer_id = 0;
                        }
                        ?>
                        <div class="prod-item">
                            <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id }}" class="item">
                                @if(isset($offer_data))
                                <p class="product-tag">
                                    @if($lang == 'en')
                                    {{$offer_data->name_en}}
                                    @else
                                    {{$offer_data->name_ar}}
                                    @endif
                                </p>
                                @endif 
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="offer image">
                                    <div class="hover-prod-btn">
                                        <ul>
                                            <li><a href="javascript:;" onclick="add_to_cart({{$product->id}})"  class="ora-btn"> {{trans('lang.add_to_cart')}}</a></li>
                                            <li><a  href="javascript:;" class="gra-btn" onclick="get_product({{$product->id}}, {{$offer_id}})" class="gra-btn" data-toggle="modal" data-target="#myModal"> {{trans('lang.quick_view')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-brand">
                                    <?php $brand = \App\Brand::find($product->brand_id) ?>
                                    @if($lang == 'en')
                                    {{$brand->name_en}}
                                    @else
                                    {{$brand->name_ar}}
                                    @endif
                                </div>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{ str_limit($product->name_en, 50) }}</p>
                                    @else
                                    <p>{{ str_limit($product->name_ar, 50) }}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        @if($product->original_price != 0)<div class="col-md-12 col-xs-12  text-muted"> {{$product->original_price}} {{trans('lang.SR')}}</div>@endif
                                        <div class="col-md-12 col-xs-12">{{trans('lang.now')}}{{$product->discount_price}} {{trans('lang.SR')}}</div>
                                    </div>
                                </div>
                                <div class="prod-btns">
                                    @if($product->original_price != 0)
                                    <?php
                                    $save_price = ($product->original_price - $product->discount_price);
                                    $percent_price = number_format((($product->original_price - $product->discount_price) / ($product->original_price)) * 100);
                                    ?>
                                    <span class="saved-btn">{{trans('lang.save')}}  {{$save_price}} {{trans('lang.SR')}} ( {{$percent_price}}%) </span>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop