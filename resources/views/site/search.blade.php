@extends('site.layouts.master')
@section('content')
@include('site.search_sidebar')


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
<!--                                                        <p class="text-muted">XT786EL47DXW</p>
                                    <ul class="more-description">
                                        <li>نوع: شواحن متنقلة</li>
                                        <li>متوافق مع: أجهزة التابلت والجوالات</li>
                                        <li>Compatible with: Tablets, Mobile Phones</li>
                                    </ul>-->
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


<div class="clearfix visible-xs"></div>
<div class="col-md-9 col-sm-9">
    <div class="login-part">
        <div class="search-results-hd">
            <div class="search-results">
                <p class="pull-right">نتائج البحث : {{count($products)}}</p>
                <!--                            <ul class="trade-list">
                                                <li class="select-it"><a href="#">أبيض <span class="badge"><i class="fa fa-times"></i></span></a></li>
                                                <li class="select-it"><a href="#">أصفر <span class="badge"><i class="fa fa-times"></i></span></a></li>
                                            </ul>-->
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
            @foreach($products as $row)
            <?php
            $offer_id = \App\Product_offers::where('product_id', $row->id)->select('offer_id')->first();
            if (empty($offer_id)) {
                $offer_id = 0;
            }
            ?>
            <div class="search-item">
                <div class="prod-item">
                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$row->id }}" class="item">
                        @if(isset($offer_id) && !empty($offer_id))
                        <p class="product-tag">
                            @if($lang == 'en')
                            {{\App\Offer::find($offer_id)->name_en}}
                            @else
                            {{\App\Offer::find($offer_id)->name_ar}}
                            @endif
                        </p>
                        @endif
                        <div class="prod-img">
                            <img src="{{URL::to('/images/products') . '/' . $row->image}}" alt="offer image">
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
                            <p>
                                @if($lang == 'en')
                                {{$row->name_en}}
                                @else
                                {{$row->name_ar}}
                                @endif
                            </p>
                            <div class="more-hide hidden">
                                <!--                                                                <ul class="more-description">
                                                                                                    <li>Silver 3- Fold Clasp</li>
                                                                                                    <li>Black Dial With Silver Display</li>
                                                                                                    <li>Water Resistant Up To 50 M</li>
                                                                                                    <li>Ion- Plated Bezel</li>
                                                                                                    <li>Water Resistant Up To 50 M</li>
                                                                                                    <li>ساعة كلاسيكية من بيت كاسيو. ساعة راقية من الستانلس ستيل مع شاشة عرض حي. هذه الساعة للرجال الذين يبحثون عن القوة والثقة.</li>
                                                                                                </ul>-->
                            </div>
                        </div>

                        <div class="prod-salary">
                            <div class="row">
                                @if($row->original_price != 0) <div class="col-md-12 col-xs-12  text-muted">{{$row->original_price}} {{trans('lang.SR')}}</div>@endif
                                <div class="col-md-12 col-xs-12"> {{trans('lang.now')}}{{$row->discount_price}}{{trans('lang.SR')}}</div>
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
                        <div class="finish-list-a hidden">
                            <div class="row">
                                <div class="col-md-12 col-xs-12"><a href="{{URL::to('/').'/'.$lang.'/product/'.$row->id }}" class="bask-link-gray"> {{trans('lang.details')}}</a></div>
                                <div class="col-md-12 col-xs-12"><a href="javascript:;" onclick="add_to_cart({{$row->id}})" class="bask-link-orange"> {{trans('lang.add_to_cart')}} </a></div>
                                <li><a  href="javascript:;" onclick="add_to_cart({{$row->id}})" class="ora-btn">{{trans('lang.add_to_cart')}}</a></li>
                                <li><a href="javascript:;" class="gra-btn" onclick="get_product({{$row->id}}, {{$offer_id}})"  data-toggle="modal" data-target="#myModal">{{trans('lang.quick_view')}}</a></li>
                            </div>
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


</section>
@stop