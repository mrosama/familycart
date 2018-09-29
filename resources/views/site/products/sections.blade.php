@extends('site.layouts.master')
@section('content')
@include('site.products.sidebar')

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
                                    <img id="zoom_03"  src="#"  data-zoom-image="#"/>
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
                                            <div class="col-md-12 col-xs-12  text-muted"> <span id="original_price_modal"> {{trans('lang.SR')}}</span> </div>
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


<div class="search-part">
    @foreach($products as $product)         
    <?php
    $offer = \App\Product_offers::where('product_id', $product->id)->first();
    if (empty($offer)) {
        $offer_id = 0;
    } else {
        $offer_id = $offer->offer_id;
    }
    ?>
    <div class="search-item">
        <div class="prod-item">
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
                <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}" class="item">
                    <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="{{$product->name_en}}" />
                </a>
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
                <div class="more-hide hidden">
                    <ul class="more-description">
                        @if($lang == 'en')
                        <p></p>
                        @else
                        <p></p>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="prod-salary">
                <div class="row">
                    @if($product->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$product->original_price}} {{trans('lang.SR')}} </div>@endif
                    <div class="col-md-12 col-xs-12">{{trans('lang.now')}}{{$product->discount_price}} {{trans('lang.SR')}}</div>
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

            <div class="finish-list-a hidden">
                <div class="row">
                    <div class="col-md-12 col-xs-12"><a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}" class="bask-link-gray">إستعرض التفاصيل</a></div>
                    <div class="col-md-12 col-xs-12"><a href="javascript:;" onclick="add_to_cart({{$product->id}})" class="bask-link-orange">{{trans('lang.add_to_cart')}}</a></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

</section>
@section('js')
<script>
    $('#getBrand').keyup(function (event) {
    var word = $(this).val();
    $.each($('li.liBrand').children('a'), function (index, val)
    {
    console.log($(this).parent());
    if ($(this).text().toLowerCase().search(word.toLowerCase()) != - 1)
            $(this).parent().show();
    else
            $(this).parent().hide();
    });
    });
</script>
@stop
@stop