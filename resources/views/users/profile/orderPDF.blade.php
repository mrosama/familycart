<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body style="font-family:Arial ; direction: rtl;font-size: 20px;">
        <div class="clearfix visible-xs"></div>
        <div class="col-md-9 col-sm-8 col-xs-12" >
            <div class="search-results-hd" id="divToPrint">
                <h1> متجر المالكي</h1>
                <div class="user-prof-con">
                    <div class="row dir-rtl user-profile-form">
                        <div class="col-sm-6 pull-right">
                            <p> {{trans('lang.order_date')}}: {{$order->created_at}}</p>
                            <p> {{trans('lang.order_num')}}: {{$order->id}}</p>
                            <p>{{trans('lang.invoice_amount')}}: {{$order->total_price}} {{trans('lang.SR')}}</p>
                            <p>{{trans('lang.sendTo')}}: {{\App\Shipping::where('id' , $order->shipping_id)->first()->address}}</p>
                        </div>
                        <div class="col-sm-6 bor-1">
                            <p>{{trans('lang.recipient')}}: {{$order->getUser->name}}</p>
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

                                    echo '<p class="charge-p text-center"> ' . trans('lang.end_request_in') . ' : ' . $days . trans('lang.day') . ' , ' . $hours . trans('lang.hour') . ' , ' . $mins . trans('lang.minute') . '  </p>';
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <h4 class="user-prof-name"> <i class="fa fa-tags"></i> {{trans('lang.orders')}} </h4>
                <div class="user-prof-con">
                    <div class="prof-basket-con">

                        <table width="100%" >
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            <thead>
                            <tbody>
                                <?php $sum = []; ?>
                                <?php $order_products = \App\Order_product::where('order_id', $order->id)->get(); ?>
                                @foreach($order_products as $product)
                                @if($product->color_size_id != 0)
                                <?php $color_size_data = \App\Product_colors_size::find($product->color_size_id); ?>
                                @else
                                <?php $color_size_data = null; ?>
                                @endif
                                <tr>
                                    <th>1</th>
                                    <th> 
                                        {{trans('lang.product_name')}} 
                                        @if($color_size_data != null)
                                        <p>
                                            @if($lang == 'en')
                                            {{$color_size_data->name_en}}
                                            @else
                                            {{$color_size_data->name_ar}}
                                            @endif
                                        </p>
                                        @elseif(App\Product::find($product->product_id) != null)
                                        <p>
                                            @if($lang == 'en')
                                            {{$product->name_en}}
                                            @else
                                            {{$product->name_ar}}
                                            @endif
                                        </p>
                                        @endif
                                    </th>
                                    <th>{{trans('lang.price')}} : {{$product->price}} {{trans('lang.SR')}}</th>
                                    <th>{{trans('lang.quantity')}} : {{$product->qty}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4 class="user-prof-name"> <i class="fa fa-money"></i> {{trans('lang.order_total')}}</h4>
                <div class="user-prof-con">
                    <div class="user-profile-form">
                        <p><strong>{{trans('lang.total')}} :</strong> {{$order->total_price}} {{trans('lang.SR')}}</p>
                        @if($order->fastCharge == 1)
                        <p><strong>{{trans('lang.fastCharge')}}:</strong> 20 {{trans('lang.SR')}} </p>
                        @endif
                        @if($order->gift == 1)
                        <p><strong>قيمة الشحن مع تغليف الهدية:</strong> 20 {{trans('lang.SR')}} </p>
                        @endif
                        <p><strong> {{trans('lang.sum')}}:</strong> 
                            @if($order->gift == 1 && $order->fastCharge == 1)
                            <?php
                            $CartTotal = $order->total_price;
                            $CartTotal = str_replace(',', '', $CartTotal);
                            $CartTotal = (float) $CartTotal + 20 + 20;
                            echo $CartTotal;
                            ?>
                            @elseif($order->gift == 1 ||  $order->fastCharge == 1)
                            <?php
                            $CartTotal = $order->total_price;
                            $CartTotal = str_replace(',', '', $CartTotal);
                            $CartTotal = (float) $CartTotal + 20;
                            echo $CartTotal;
                            ?>
                            @else
                            {{$order->total_price}}
                            @endif

                            {{trans('lang.SR')}}</p>
                        @if($order->gift == 1)
                        <p><strong> نص رسالة الهدية :</strong> {{$order->gift_text}} </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>