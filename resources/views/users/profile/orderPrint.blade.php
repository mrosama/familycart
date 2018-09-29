<!DOCTYPE html>
<html>
    <head>
        <title>{{trans('lang.site_name')}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @if($lang == 'en')
        <link rel="stylesheet" href="{{URL::to('/site_template')}}/style_en.css" type="text/css" />
        @else
        <link rel="stylesheet" href="{{URL::to('/site_template')}}/style.css" type="text/css" />
        @endif
        <style>
            th{text-align: right;}
        </style>

    </head>
    <body>

        <div class="container" style="direction: rtl;">
            <p>  <a href="javascript:;"  onclick="window.print();" class="btn btn-primary btn-sm">{{trans('lang.saveBill')}}</a> </p>
            <h2 style="text-align: center">{{trans('lang.site_name')}}</h2>
            <table class="table table-bordered">
                <tbody >
                    <tr>
                        <th> {{trans('lang.order_date')}} </th><td>{{$order->created_at}}</td>
                        <th>{{trans('lang.recipient')}}</th><td>{{$order->getUser->name}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('lang.order_num')}}  </th><td>{{$order->id}}</td>
                        <th>{{trans('lang.payment_method')}}</th>
                        <td>                        
                            @if($order->payment_method == 'cash')
                            {{trans('lang.cash')}}
                            @elseif($order->payment_method == 'visa')
                            {{trans('lang.visa')}}
                            @elseif($order->payment_method == 'master')
                            {{trans('lang.master')}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('lang.invoice_amount')}}  </th><td>{{$order->total_price}} {{trans('lang.SR')}}</td>
                        <th>{{trans('lang.order_status')}}  </th>
                        <td>
                            @if($order->status == 'request_receipt')
                            {{trans('lang.request_receipt')}}
                            @elseif($order->status == 'follow_request')
                            {{trans('lang.follow_request')}}
                            @elseif($order->status == 'deleviry_request')
                            {{trans('lang.deleviry_request')}}
                            @elseif($order->status == 'end_request')
                            {{trans('lang.end_request')}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('lang.sendTo')}}  </th><td>{{\App\Shipping::where('id' , $order->shipping_id)->first()->address}}</td>
                        <th></th><td></td>
                    </tr>
                </tbody>
            </table>

            <h2 style="text-align: center">{{trans('lang.orders')}}</h2>
            <table class="table table-bordered">
                <?php $sum = []; ?>
                <?php $order_products = \App\Order_product::where('order_id', $order->id)->get(); ?>
                <tbody >
                    @foreach($order_products as $product)
                    @if($product->color_size_id != 0)
                    <?php $color_size_data = \App\Product_colors_size::find($product->color_size_id); ?>
                    @else
                    <?php $color_size_data = null; ?>
                    @endif
                    <tr>
                        <td>                                
                            @if($color_size_data != null)
                            <img src="{{URL::to('/images/products').'/'.$color_size_data->image}}" width="80px;" height="80px;" alt="product image" class="img-thumbnail">
                            @else
                            <img src="{{URL::to('/images/products').'/'.$product->image}}" width="80px;" height="80px;" alt="product image" class="img-thumbnail">
                            @endif
                        </td>
                        <td>                                
                            <strong>
                                @if($color_size_data != null)
                                <p>
                                    @if($lang == 'en')
                                    {{$color_size_data->name_en}}
                                    @else
                                    {{$color_size_data->name_ar}}
                                    @endif
                                </p>
                                @elseif(App\Product::find($product->product_id))
                                <p>
                                    @if($lang == 'en')
                                    {{$product->name_en}}
                                    @else
                                    {{$product->name_ar}}
                                    @endif
                                </p>
                                @else
                                <p>
                                    {{$product->name_ar}} 
                                    <br><br>
                                    <del style="color:red;">{{trans('lang.product_deleted')}}</del>
                                </p>
                                @endif
                            </strong>
                        </td>
                        <td>
                            <strong>{{trans('lang.quantity')}} : {{$product->qty}}</strong>
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
                        </td>
                        <td><strong>{{trans('lang.price')}} :   {{$product->price}} {{trans('lang.SR')}}</strong>  </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><h3>{{trans('lang.order_total')}}</h3></td>
                    </tr>
                    <tr>
                        <td colspan="4"><h5> {{trans('lang.sum')}} : {{$order->total_price}} {{trans('lang.SR')}}</h5></td>
                    </tr>
                    <?php
                    $city_id = \App\Shipping::find($order->shipping_id)->city_id;
                    $charge_value = \App\City::find($city_id)->charge_value;
                    ?>
                    @if($charge_value)
                    <tr>
                        <td colspan="4"><h5> {{trans('lang.charge')}} : {{$charge_value}} {{trans('lang.SR')}}</h5></td>
                    </tr>
                    @endif

                    @if($order->fastCharge == 1)
                    <tr>
                        <td colspan="4"><h5> {{trans('lang.fastCharge')}} : 20 {{trans('lang.SR')}}</h5></td>
                    </tr>
                    @endif

                    @if($order->gift == 1)
                    <tr>
                        <td colspan="4"><h5> {{trans('lang.shippingGift')}} : 20 {{trans('lang.SR')}}</h5></td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="4">
                            <h5>
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

                                {{trans('lang.SR')}}
                            </h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>
</html>
