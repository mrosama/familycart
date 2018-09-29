@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')

@if(Session::has('success'))
<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left " style="margin-top: 50px;" dir="rtl">
    <div class="alert alert-success">{{Session::get('success')}}</div>
</div>
@endif

@if($orders->count() > 0)
@foreach($orders as $order)
<div class="clearfix visible-xs"></div>
<div class="col-md-9 col-sm-8 col-xs-12" >
    @if($order->getUser)
    <div class="search-results-hd" id="divToPrint">
        <h4 class="user-prof-name"><i class="fa fa-archive"></i> {{trans('lang.order_history')}}</h4>
        <div class="user-prof-con">
            <div class="row dir-rtl user-profile-form">
                <div class="col-sm-6 pull-right">
                    <p> {{trans('lang.order_date')}} : {{$order->created_at}}</p>
                    <p> {{trans('lang.order_num')}} : {{$order->id}}</p>
                    <p>{{trans('lang.invoice_amount')}} : {{$order->total_price}} {{trans('lang.SR')}}</p>
                    <p>{{trans('lang.sendTo')}} : {{\App\Shipping::where('id' , $order->shipping_id)->first()->address}}</p>
                </div>
                <div class="col-sm-6 bor-1">
                    <p>{{trans('lang.recipient')}} : {{$order->getUser->name}}</p>
                    <p>{{trans('lang.payment_method')}}: 
                        @if($order->payment_method == 'cash')
                        {{trans('lang.cash')}}
                        @elseif($order->payment_method == 'visa')
                        {{trans('lang.visa')}}
                        @elseif($order->payment_method == 'master')
                        {{trans('lang.master')}}
                        @endif
                    </p>
                    <p> {{trans('lang.order_status')}} : 
                        @if($order->status == 'request_receipt')
                        {{trans('lang.request_receipt')}}
                        @elseif($order->status == 'follow_request')
                        {{trans('lang.follow_request')}}
                        @elseif($order->status == 'deleviry_request')
                        {{trans('lang.deleviry_request')}}
                        @elseif($order->status == 'end_request')
                        {{trans('lang.end_request')}}
                        @endif
                    </p>
                    <p>
                        <?php
                        if ($order->status != 'end_request') {
                            // enter start date below like this: "January 2, 2001"
                            $start = $order->created_at;
                            //--------------------------
                            $now = strtotime("now");
                            $then = strtotime("$start");
                            $difference = $now - $then;
                            $num = $difference / 86400;
                            $days = intval($num);
                            $num2 = ($num - $days) * 24;
                            $hours = intval($num2);
                            $num3 = ($num2 - $hours) * 60;
                            $mins = intval($num3);
                            echo trans('lang.end_request_in') . ' : ' . $days . trans('lang.day') . ' , ' . $hours . trans('lang.hour') . ' , ' . $mins . trans('lang.minute');
                        }
                        ?>
                    </p>
                    <!--<p>{{trans('lang.bill')}} :   <a href="{{URL::to($lang.'/profile/orderPDF/'.$order->id)}}" target="_blank" class="btn btn-primary btn-sm">{{trans('lang.saveBill')}}</a> </p>-->
                    <p>{{trans('lang.bill')}} :   <a href="{{URL::to($lang.'/profile/orderPrint/'.$order->id)}}" target="_blank"  class="btn btn-primary btn-sm">{{trans('lang.saveBill')}}</a> </p>


                </div>
            </div>
        </div>
        <h4 class="user-prof-name"> <i class="fa fa-truck"></i> {{trans('lang.order_status')}}</h4>
        <div class="user-prof-con">
            <div class="user-profile-form">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger  {{($order->status == 'request_receipt')? 'active progress-bar-striped' : ''}}" role="progressbar" style="width:25%">
                        {{trans('lang.request_receipt')}}
                    </div>
                    <div class="progress-bar progress-bar-warning  {{($order->status == 'follow_request')? 'active progress-bar-striped' : ''}}" role="progressbar" style="width:25%">
                        {{trans('lang.follow_request')}}
                    </div>
                    <div class="progress-bar progress-bar-primary  {{($order->status == 'deleviry_request')? 'active progress-bar-striped' : ''}}" role="progressbar" style="width:25%">
                        {{trans('lang.deleviry_request')}}
                    </div>
                    <div class="progress-bar progress-bar-success  {{($order->status == 'end_request')? 'active progress-bar-striped' : ''}}" role="progressbar" style="width:25%">
                        {{trans('lang.end_request')}}
                    </div>
                </div>
            </div>
        </div>
        <h4 class="user-prof-name"> <i class="fa fa-tags"></i> {{trans('lang.orders')}} </h4>
        <div class="user-prof-con">
            <div class="prof-basket-con">
                <?php $sum = []; ?>
                <?php $order_products = \App\Order_product::where('order_id', $order->id)->get(); ?>
                @foreach($order_products as $product)
                @if($product->color_size_id != 0)
                <?php $color_size_data = \App\Product_colors_size::find($product->color_size_id); ?>
                @else
                <?php $color_size_data = null; ?>
                @endif
                <div class="bask-item">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="prod-img">
                                @if($color_size_data != null)
                                <img src="{{URL::to('/images/products').'/'.$color_size_data->image}}" alt="product image" class="img-thumbnail">
                                @else
                                <img src="{{URL::to('/images/products').'/'.$product->image}}" alt="product image" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="text-center">
                                <h5>
                                    <strong>
                                        @if($color_size_data != null)
                                        <p><a href="{{URL::to('/').'/'.$lang.'/product/'.$product->product_id.'?color_size='.$color_size_data->id}}" target="_blank">
                                                @if($lang == 'en')
                                                {{$color_size_data->name_en}}
                                                @else
                                                {{$color_size_data->name_ar}}
                                                @endif
                                            </a>
                                        </p>
                                        @elseif(App\Product::find($product->product_id))
                                        <p><a href="{{URL::to('/').'/'.$lang.'/product/'.$product->product_id}}" target="_blank">
                                                @if($lang == 'en')
                                                {{$product->name_en}}
                                                @else
                                                {{$product->name_ar}}
                                                @endif
                                            </a>
                                        </p>
                                        @else
                                        <p>
                                            {{$product->name_ar}} 
                                            <br><br>
                                            <del style="color:red;">{{trans('lang.product_deleted')}}</del>
                                        </p>
                                        @endif
                                    </strong>
                                </h5>
                                <br>
                                <?php $product_exists = \App\Product::find($product->product_id); ?>
                                @if($product_exists)
                                <p>{{trans('lang.expectedReceipts')}} : <br> {{\App\Product::find($product->product_id)->duration_delivery}} {{trans('lang.days')}}</p>
                                <br>                             
                                <a href="{{URL::to('/').'/'.$lang.'/buy_now/'.$product->product_id}}" class="btn btn-primary btn-sm">{{trans('lang.buyAgain')}}</a>
                                @endif
                            </div>
                        </div>
                        @if($product_exists)
                        <div class="col-sm-2 col-xs-12">
                            <h5><strong>{{trans('lang.quantity')}} : {{$product->qty}}</strong></h5> 
                            @if($color_size_data != null)
                            @if($color_size_data->size_id != 0)
                            <br><strong>{{trans('lang.size')}}</strong> <br> 
                            {{\App\Size::find($color_size_data->size_id)->name}}
                            @endif
                            @else
                            <?php $size = \App\Product::find($product->product_id)->size_id; ?>
                            @if($size != 0)
                            <br><strong>{{trans('lang.size')}}</strong> <br> 
                            {{\App\Size::find($size)->name}}
                            @endif
                            @endif
                            <br><strong>{{trans('lang.seller')}}</strong> <br> 

                            @if($product->seller_id != 0 && $lang =='en')
                            {{\App\Seller::find($product->seller_id)->trade_name_en}}
                            @elseif($product->seller_id != 0 && $lang =='ar')
                            {{\App\Seller::find($product->seller_id)->trade_name}}
                            @endif



                        </div>
                        @endif
                        <div class="col-sm-2 col-xs-12">
                            <h5><strong>{{trans('lang.price')}} : {{$product->price}} {{trans('lang.SR')}}</strong></h5>
                        </div>
                        @if($product_exists)
                        <div class="col-sm-2 col-xs-12">
                            @if($order->status == 'end_request')
                            <a href="{{URL::to('/').'/'.$lang.'/profile/rating/'.$order->id.'/'.$product->product_id}}" class="btn btn-success">{{trans('lang.product_reviews')}}</a><br><br>
                            @endif
                            <a href="{{URL::to('/').'/'.$lang.'/profile/return?order_id='.$order->id.'&product_id='.$product->product_id}}" class="btn btn-danger">{{trans('lang.productReturn')}}</a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <h4 class="user-prof-name"> <i class="fa fa-money"></i> {{trans('lang.order_total')}}</h4>
        <div class="user-prof-con">
            <div class="user-profile-form">
                <p><strong> {{trans('lang.sum')}} :</strong> {{$order->total_price}} {{trans('lang.SR')}}</p>

                <?php
                $city_id = \App\Shipping::find($order->shipping_id)->city_id;
                $charge_value = \App\City::find($city_id)->charge_value;
                ?>
                @if($charge_value)
                <p><strong> {{trans('lang.charge')}} :</strong> {{$charge_value}} {{trans('lang.SR')}}</p>
                @endif

                @if($order->fastCharge == 1)
                <p><strong>{{trans('lang.fastCharge')}} :</strong> 20 {{trans('lang.SR')}} </p>
                @endif

                @if($order->gift == 1)
                <p><strong>{{trans('lang.shippingGift')}} :</strong> 20 {{trans('lang.SR')}} </p>
                @endif

                <p>
                    <strong> {{trans('lang.total')}} :</strong> 
                    @if($order->gift == 1 && $order->fastCharge == 1)
                    <?php
                    $CartTotal = $order->total_price;
                    $CartTotal = str_replace(',', '', $CartTotal);
                    $CartTotal = (float) $CartTotal + 20 + 20;
                    if ($charge_value) {
                        echo $CartTotal + $charge_value;
                    } else {
                        echo $CartTotal;
                    }
                    ?>
                    @elseif($order->gift == 1 ||  $order->fastCharge == 1)
                    <?php
                    $CartTotal = $order->total_price;
                    $CartTotal = str_replace(',', '', $CartTotal);
                    $CartTotal = (float) $CartTotal + 20;
                    if ($charge_value) {
                        echo $CartTotal + $charge_value;
                    } else {
                        echo $CartTotal;
                    }
                    ?>
                    @else
                    {{$order->total_price}}
                    @endif

                    {{trans('lang.SR')}}</p>
                @if($order->gift == 1)
                <p><strong> {{trans('lang.msgGift')}} :</strong> {{$order->gift_text}} </p>
                @endif
            </div>
        </div>
    </div>
    @endif
    <div class="text-center">
        {{$orders->links()}}
    </div>
</div>
@endforeach
@else
<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left "><!--start charge-->
    <div class="alert alert-danger text-center col-lg-12 col-md-12 col-sm-12 col-xs-12" dir="rtl" style="margin-top:100px">
        {{trans('lang.no_orders')}}<br>
        <a href="{{URL::to('/').'/'.$lang}}">{{trans('lang.show_products')}}</a>
        <button class="close" data-close="alert"></button>
    </div>    
</div>
@endif
</div>
</div>
</div>
</section>
@stop