@extends('site.layouts.master')

@section('content')
<section id="main-product">
    <div class="container">
        <div class="main-product-partion">
            <div class="main-product-info dir-rtl">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="product-info-img" >
                            <img id="zoom_03" src="{{URL::to('/').'/images/products/'.$product_color_data->image}}" data-zoom-image="{{URL::to('/').'/images/products/'.$product_color_data->image}}"/>
                            <div id="gallery_01">
                                @if(isset($product_color_images) && count($product_color_images) > 0)
                                @foreach($product_color_images as $row)
                                <a  href="#" class="elevatezoom-gallery active" data-update="" data-image="{{URL::to('/images/products/').'/'.$row->image}}" data-zoom-image="{{URL::to('/images/products/').'/'.$row->image}}">
                                    <img src="{{URL::to('/images/products/').'/'.$row->image}}" alt="product images "/>
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="info-txt-part">
                            <h2>
                                <strong>
                                    @if($lang == 'en')
                                    {{$product->getBrand->name_en}}
                                    @else
                                    {{$product->getBrand->name_ar}}
                                    @endif
                                </strong>
                            </h2>
                            <h4>
                                @if($lang == 'en')
                                {{$product_color_data->name_en}}
                                @else
                                {{$product_color_data->name_ar}}
                                @endif
                            </h4>
<!--                            <p class="text-muted">XT786EL47DXW</p>
                            <ul>
                                <li>نوع: شواحن متنقلة</li>
                                <li>متوافق مع: أجهزة التابلت والجوالات</li>
                                <li>Compatible with: Tablets, Mobile Phones</li>
                            </ul>-->
                        </div>
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>السعر</h5>
                            <div class="prod-salary">
                                <div class="row">
                                    @if($product_color_data->original_price != 0)<div class="col-xs-6  text-muted pull-right">{{$product_color_data->original_price}} {{trans('lang.SR')}}</div>@endif
                                    <div class="col-xs-6">{{$product_color_data->discount_price}} {{trans('lang.SR')}}</div>
                                </div>
                            </div>
                        </div>
                        @if(isset($product->color_id))
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>اللون</h5>
                            <div class="prod-salary">
                                <div class="row">
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id}}"  class="btn btn-primary"> {{App\Color::find($product->color_id)->name_ar}} </a>
                                    @if(count($product_colors) > 0)
                                    @foreach($product_colors as $color)
                                    @if($color->id == $product_color_data->id)
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id.'/'.$color->id}}" class="btn btn-warning"> {{App\Color::find($color->color_id)->name_ar}} </a>
                                    @else
                                    <a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id.'/'.$color->id}}" class="btn btn-primary"> {{App\Color::find($color->color_id)->name_ar}} </a>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(isset($product->size_id))
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>الحجم</h5>
                            <div class="prod-salary">
                                <div class="row">
                                    <button type="button" class="btn btn-warning"> {{App\Size::find($product->size_id)->name}} </button>
                                    @if(count($product_sizes) > 0)
                                    @foreach($product_sizes as $size)
                                    <button type="button" class="btn btn-primary"> {{App\Size::find($size->size_id)->name}} </button>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

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
                            <div class="info-btns">
                                <a href="#" class="info-btn-buy"><i class="fa fa-shopping-cart"></i> {{trans('lang.add_to_cart')}}  </a>
                                <a href="#" class="info-btn-fav"><i class="fa fa-heart"></i> {{trans('lang.add_to_fav')}}  </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-building"></i>البائع</h5>
                            <div class="info-txt-part-con">
                                <p>متجر وادي</p>
                            </div>

                        </div>
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-users"></i>الباعة الآخرين</h5>
                            <div class="info-txt-part-con">
                                <p>لدينا 1 بائعين آخرين لهذا المنتج (إبتداءا من 3229ر.س)</p>
                                <a href="#" class="btn-saler">1 بائعين آخرين<i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                        @if($product->duration_charging || $product->duration_delivery)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-truck"></i>تسليم سريع</h5>
                            <div class="info-txt-part-con">
                                @if($product->duration_charging)
                                <p>{{$product->duration_charging}}</p>
                                @endif
                                @if($product->duration_delivery)
                                <p>{{$product->duration_delivery}}</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-hand-paper-o"></i>متجر المالكى يعدكم</h5>
                            <div class="info-txt-part-con">
                                <ul>
                                    <li>ضمان الاستبدال خلال 14 يوم</li>
                                    <li>100 % دفع آمن</li>
                                    <li>100 % أصلي</li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-tags"></i>العروض</h5>
                            <div class="info-txt-part-con">
                                <p>فلاش وماوس لاسلكي وحقيبة لابتوب مجاناً مع هذا اللابتوب.</p>
                            </div>
                        </div>
                        @if($product->payment_on_delivery == 1)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-money"></i>الدفع عند الإستلام متوفر</h5>
                            <div class="info-txt-part-con">
                                <p>يمكنك الدفع لهذا المنتج باستخدام خدمة الدفع عند الاستلام لدينا</p>
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
                            <h5 class="info-txt-part-hd"><i class="fa fa-gift"></i>تغليف الهدايا متاح</h5>
                        </div>
                        @endif
                        @if($product->free_charge)
                        <div class="info-txt-part">
                            <h5 class="info-txt-part-hd"><i class="fa fa-star"></i>شحن مجاني</h5>
                            <div class="info-txt-part-con">
                                <p>شحن مجاني على الطلبيات بقيمة 150 ريال وأكثر</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
        <div class="main-product-partion dir-rtl">
            <h2 class="product-partion-header">الباعة الآخرين (1)</h2>
            <p class="prod-txt-center">ماك بوك برو(MD101) من ابل، انتل كور أي5، 13.3بوصة، ذاكرة عشوائية 4 جيجابايت، هارد ديسك 500 جيجابايت - فضي</p>
            <div class="product-partion-con">
                <table class="table table-hover prod-table table-responsive">
                    <thead>
                        <tr>
                            <th>البائع</th>
                            <th class="hidden-xs">التقييم</th>
                            <th>الضمان</th>
                            <th class="hidden-xs">التوصيل</th>
                            <th>السعر</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>متجر المالكى</strong>
                                <div class="visible-xs">
                                    <div class="btn-saler">4.0 / 5 <i class="fa fa-star"></i></div>
                                    <p> الشحن في 3 - 5 أيام</p>
                                    <p> التسليم في غضون 7 - 10 أيام<p>
                                </div>
                            </td>
                            <td class="hidden-xs"><div class="btn-saler">4.0 / 5 <i class="fa fa-star"></i></div></td>
                            <td>24 شهور ضمان</td>
                            <td class="hidden-xs">
                                <p> الشحن في 3 - 5 أيام</p>
                                <p> التسليم في غضون 7 - 10 أيام<p>
                            </td>
                            <td><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>1500 ريال </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.product_info')}}</h2>
            @if($lang == 'en')
            <p class="prod-txt-center">{{$product->name_en}}</p>
            @else
            <p class="prod-txt-center dir-rtl">{{$product->name_ar}}</p>
            @endif
            @if($lang == 'en')
            <div class="product-partion-con">
                <p>{{$product->details_en}}</p>
            </div>
            @else
            <div class="product-partion-con  dir-rtl">
                <p>{{$product->details_ar}}</p>
            </div>
            @endif

            @if($product->video)
            <video width="500" height="250" controls style="margin-left: 25%;">
                <source src="{{URL::to('/videos/products').'/'.$product->video}}" type="video/mp4">
                <source src="{{URL::to('/videos/products').'/'.$product->video}}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif
        </div>
        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.shipping_return')}}</h2>
            <div class="product-partion-con  dir-rtl">
                @if($lang == 'en')
                {{App\Setting::find(1)->shipping_return_en}}
                @else
                {{App\Setting::find(1)->shipping_return}}
                @endif
            </div>
        </div>
        <div class="main-product-partion">
            <h2 class="product-partion-header">تقييم المنتج</h2>
            <p class="prod-txt-center">ماك بوك برو(MD101) من ابل، انتل كور أي5، 13.3بوصة، ذاكرة عشوائية 4 جيجابايت، هارد ديسك 500 جيجابايت - فضي</p>
            <div class="product-partion-con dir-rtl">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-xs-9">
                                <ul class="pro-stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-full"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <span class="text-muted"><small>بناء على تقييم 3045</small></span>
                            </div>
                            <div class="col-xs-3">
                                <h1><strong>3.5</strong></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 dir-rtl">
                        <h5><strong>تقييم المستخدمين (3045)</strong></h5>
                        <ul class="users-rate">
                            <li><div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">4959</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">4 - 5 نجوم</div>
                                    </div>
                                </div></li>
                            <li><div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">4959</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="40"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">3 - 4 نجوم</div>
                                    </div>
                                </div></li>
                            <li><div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">4959</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">2 - 3 نجوم</div>
                                    </div>
                                </div></li>
                            <li><div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">4959</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="10"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:10%">
                                                    <span class="sr-only">10% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">1 - 2 نجوم</div>
                                    </div>
                                </div></li>
                            <li><div class="prog-users-bar">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><p class="text-muted">4959</p></div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                    <span class="sr-only">0% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3">0 - 1 نجوم</div>
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
        <div class="main-product-partion dir-rtl">
            <h4 class="product-partion-header">تقييمات المستخدمين (3045)</h4>
            <div class="product-partion-con">
                <div class="users-comment">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 pull-right">
                            <img src="assets/img/user-comment.jpg" alt="user-comment" class="img-comment">
                            <ul class="users-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-full"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <p class="text-muted"><i class="fa fa-calendar" style="margin-left:5px;"></i>2015-07-05</p>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h4><strong>I always swore I'd never own a Mac, and being a graphic design student, I thought I could just get a PC </strong></h4>
                            <p>I always swore I'd never own a Mac, and being a graphic design student, </p>
                        </div>
                    </div> 
                </div>
                <div class="users-comment">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 pull-right">
                            <img src="assets/img/products/img-(16).jpg" alt="user-comment" class="img-comment">
                            <ul class="users-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-full"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <p class="text-muted"><i class="fa fa-calendar" style="margin-left:5px;"></i>2015-07-05</p>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h4><strong>I always swore I'd never own a Mac, and being a graphic design student, I thought I could just get a PC </strong></h4>
                            <p>I always swore I'd never own a Mac, and being a graphic design student, </p>
                        </div>
                    </div> 
                </div>
                <div class="users-comment">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 pull-right">
                            <img src="assets/img/user-comment.jpg" alt="user-comment" class="img-comment">
                            <ul class="users-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-full"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <p class="text-muted"><i class="fa fa-calendar" style="margin-left:5px;"></i>2015-07-05</p>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <h4><strong>I always swore I'd never own a Mac, and being a graphic design student, I thought I could just get a PC </strong></h4>
                            <p>I always swore I'd never own a Mac, and being a graphic design student, </p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="main-product-partion">
            <h2 class="product-partion-header">{{trans('lang.similar_products')}}</h2>
            <div class="product-partion-con">
                <div class="part-con">
                    <div id="owl-demo">
                        @foreach($similar_product as $product)
                        <div class="item">
                            <div class="prod-item">
                                <div class="prod-img">
                                    <img src="{{URL::to('/images/products') . '/' . $product->image}}" alt="offer image" class="img-thumbnail">
                                </div>
                                <hr/>
                                <div class="prod-name">
                                    @if($lang == 'en')
                                    <p>{{ str_limit($product->name_en, 50) }}</p>
                                    @else
                                    <p>{{ str_limit($product->name_ar, 50) }}</p>
                                    @endif
                                </div>
                                <div class="prod-salary">
                                    <div class="row">
                                        <div class="col-xs-6  ">{{$product->discount_price}} {{trans('lang.SR')}} </div>
                                        @if($product->original_price != 0)
                                        <div class="col-xs-6 text-muted">{{$product->original_price}} {{trans('lang.SR')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="prod-more"><a href="{{URL::to('/').'/'.$lang.'/product/'.$product->id }}">{{trans('lang.details')}}</a></div>
                                <div class="prod-btns">
                                    <a href="#" class="btn-buy"><i class="fa fa-shopping-cart"></i> {{trans('lang.add_to_cart')}} </a>
                                    <a href="#" class="btn-fav"><i class="fa fa-heart"></i> {{trans('lang.add_to_fav')}} </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop