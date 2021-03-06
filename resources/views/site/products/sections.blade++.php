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


<div class="col-md-9 col-sm-9">
    <div class="login-part">
        <div class="search-results-hd">
            <div class="search-results">
                <p class="pull-right">نتائج البحث : {{count($result)}}</p>
                <ul class="trade-list">
                    <li class="select-it"><a href="#">أبيض <span class="badge"><i class="fa fa-times"></i></span></a></li>
                    <li class="select-it"><a href="#">أصفر <span class="badge"><i class="fa fa-times"></i></span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="search-results">
                <div class="search-arrange">
                    <h6 class="pull-right"><strong>ترتيب</strong></h6>
                    <form action="#"class="search-by">
                        <div class="form-group">
                            <select name="search-arrange-by" id="search-arrange-by" class="form-control">
                                <option value="الأكثر شهرة">الأكثر شهرة</option>
                                <option value="الجديد">الجديد</option>
                                <option value="السعر الأقل">السعر الأقل</option>
                                <option value="السعر الأعلى">السعر الأعلى</option>
                                <option value="تخفيضات">تخفيضات</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="search-arrange hidden-sm hidden-xs">
                    <h6 class="pull-right"><strong>عرض</strong></h6>
                    <ul class="list-unstyled">
                        <li>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" id="row-view"><i class="fa fa-bars"></i></button>
                                <button type="button" class="btn btn-default" id="grid-view"><i class="fa fa-th"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>
        <div class="search-part">

            @foreach($result as $product)
            <div class="search-item">
                <div class="prod-item">
                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}"  class="item">
                        <?php
                        $offer = \App\Product_offers::where('product_id', $product->id)->first();
                        if (empty($offer)) {
                            $offer_id = 0;
                        } else {
                            $offer_id = $offer->offer_id;
                        }
                        ?>
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
                            <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="{{$product->name_ar}}">
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
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
</div>
@stop