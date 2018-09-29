@extends('admin.layouts.master')
@section('title')
بيانات الطلب
@stop
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height:1535px">
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{URL::to('/admin/home')}}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">بيانات الطلب</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">بيانات الطلب</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/orders')}}" class="btn btn-primary">عرض جميع الطلبات</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اسم  صاحب الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">


                                        @if(\App\User::find($order->user_id))
                                        <?php $userName = \App\User::find($order->user_id)->name; ?>
                                        {{$userName}}
                                        @endif
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">  البريد الالكتروني</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        @if( \App\User::find($order->user_id))
                                        <?php $email = \App\User::find($order->user_id)->email; ?>
                                        {{$email}}
                                        @endif
                                    </label>
                                </div>
                                <hr>
                                <h3>بيانات الشحن</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   اسم المستلم</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        @if(\App\Shipping::find($order->shipping_id)->full_name)
                                        <?php $recipientName = \App\Shipping::find($order->shipping_id)->full_name; ?>
                                        {{$recipientName}}
                                        @endif
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">    الدولة</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php $country_id = \App\Shipping::find($order->shipping_id)->country_id; ?>
                                        @if(\App\Country::find($country_id))
                                        {{\App\Country::find($country_id)->name_ar}}
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   المدينة </label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php $city_id = \App\Shipping::find($order->shipping_id)->city_id; ?>
                                        @if(\App\City::find($city_id))
                                        {{\App\City::find($city_id)->name_ar}}
                                        @endif
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">    العنوان</label>
                                    <label class="control-label col-md-6" style="text-align: right;">

                                        @if(\App\Shipping::find($order->shipping_id)->address)
                                        <?php $address = \App\Shipping::find($order->shipping_id)->address; ?>
                                        {{$address}}
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   رقم الجوال </label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        @if(\App\Shipping::find($order->shipping_id)->mobile)
                                        <?php $mobile = \App\Shipping::find($order->shipping_id)->mobile; ?>
                                        {{$mobile}}
                                        @endif
                                    </label>
                                </div>
                                <hr>
                                <h3>بيانات الطلب</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   حالة الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        @if($order->status == 'request_receipt')
                                        مدفوع
                                        @elseif($order->status == 'follow_request')
                                        اجراءات الشحن
                                        @elseif($order->status == 'deleviry_request')
                                        تم الشحن
                                        @elseif($order->status == 'end_request')
                                        استلام العميل
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">    طريقة الدفع</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        @if($order->payment_method == 'cash')
                                        تحويل بنكي
                                        @elseif($order->payment_method == 'master')
                                        ماستر كارد
                                        @elseif($order->payment_method == 'visa')
                                        فيزا كارد
                                        @endif    
                                    </label>
                                </div>
                                @if($order->payment_method == 'cash' && $order->transfer_image != 'NULL')
                                <div class="form-group">
                                    <label class="control-label col-md-3">     صورة التحويل</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <a href="{{URL::to('/').'/images/transfer_image/'.$order->transfer_image}}" target="_blank"> <img src="{{URL::to('/').'/images/transfer_image/'.$order->transfer_image}}" width="250px"/></a>
                                    </label>
                                </div>
                                @endif

                                @if($order->gift == 1 &&  $order->fastCharge == 1)
                                <?php
                                $city_id = \App\Shipping::find($order->shipping_id)->city_id;
                                $charge_value = \App\City::find($city_id)->charge_value;
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3"> قيمة المشتريات </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->total_price}} ر .س</label>
                                </div>
                                @if($charge_value)
                                <div class="form-group">
                                    <label class="control-label col-md-3">   قيمة الشحن   </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$charge_value}} ر .س</label>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label col-md-3">    شحن  سريع </label>
                                    <label class="control-label col-md-6" style="text-align: right;">20 ر .س</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   قيمة الشحن مع تغليف الهدية</label>
                                    <label class="control-label col-md-6" style="text-align: right;">20 ر .س</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   نص رسالة الهدية  </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->gift_text}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">    اجمالي مبلغ الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php
                                        $CartTotal = $order->total_price;
                                        $CartTotal = str_replace(',', '', $CartTotal);
                                        $CartTotal = (float) $CartTotal + 20 + 20;
                                        if ($charge_value) {
                                            echo $CartTotal + $charge_value . ' ' . 'ر .س';
                                        } else {
                                            echo $CartTotal . ' ' . 'ر .س';
                                        }
                                        ?>    
                                    </label>
                                </div>

                                @elseif($order->gift == 1)
                                <div class="form-group">
                                    <label class="control-label col-md-3"> قيمة المشتريات </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->total_price}} ر .س</label>
                                </div>
                                @if($charge_value)
                                <div class="form-group">
                                    <label class="control-label col-md-3">   قيمة الشحن   </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$charge_value}} ر .س</label>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label col-md-3">   قيمة الشحن مع تغليف الهدية</label>
                                    <label class="control-label col-md-6" style="text-align: right;">20 ر .س</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">   نص رسالة الهدية  </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->gift_text}}</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">    اجمالي مبلغ الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php
                                        $CartTotal = $order->total_price;
                                        $CartTotal = str_replace(',', '', $CartTotal);
                                        $CartTotal = (float) $CartTotal + 20;
                                        if ($charge_value) {
                                            echo $CartTotal + $charge_value . ' ' . 'ر .س';
                                        } else {
                                            echo $CartTotal . ' ' . 'ر .س';
                                        }
                                        ?>    
                                    </label>
                                </div>
                                @elseif($order->fastCharge == 1)
                                <div class="form-group">
                                    <label class="control-label col-md-3"> قيمة المشتريات </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->total_price}} ر .س</label>
                                </div>
                                @if($charge_value)
                                <div class="form-group">
                                    <label class="control-label col-md-3">   قيمة الشحن   </label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$charge_value}} ر .س</label>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label col-md-3">    شحن  سريع </label>
                                    <label class="control-label col-md-6" style="text-align: right;">20 ر .س</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">    اجمالي مبلغ الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php
                                        $CartTotal = $order->total_price;
                                        $CartTotal = str_replace(',', '', $CartTotal);
                                        $CartTotal = (float) $CartTotal + 20;
                                        if ($charge_value) {
                                            echo $CartTotal + $charge_value . ' ' . 'ر .س';
                                        } else {
                                            echo $CartTotal . ' ' . 'ر .س';
                                        }
                                        ?>    
                                    </label>
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="control-label col-md-3">    اجمالي مبلغ الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">
                                        <?php
                                        if ($charge_value) {
                                            echo $order->total_price + $charge_value . ' ' . 'ر .س';
                                        } else {
                                            echo $order->total_price . ' ' . 'ر .س';
                                        }
                                        ?></label>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label class="control-label col-md-3">    تاريخ انشاء الطلب</label>
                                    <label class="control-label col-md-6" style="text-align: right;">{{$order->created_at}}</label>
                                </div>
                                <hr>
                                <h3>محتويات الطلب</h3>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> المنتجات</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center"> م  </th>
                                                    <th class="text-center">  اسم المنتج </th>
                                                    <th class="text-center">  صورة المنتج </th>
                                                    <th class="text-center">   البائع  </th>
                                                    <th class="text-center">   السعر  </th>
                                                    <th class="text-center">     الحجم </th>
                                                    <th class="text-center">     الكمية </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1; ?>
                                                @foreach($order_products  as $product)
                                                @if($product->color_size_id != 0)
                                                <?php $color_size_data = \App\Product_colors_size::find($product->color_size_id); ?>
                                                @else
                                                <?php $color_size_data = null; ?>
                                                @endif
                                                <tr>
                                                    <td class="text-center"> {{$x++}} </td>
                                                    <td class="text-center"> 
                                                        @if($color_size_data != null)
                                                        {{$color_size_data->name_ar}}
                                                        @else
                                                        {{$product->name_ar}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($color_size_data != null)
                                                        <img src="{{URL::to('/') . '/images/products/' .$color_size_data->image}}" width="70px" height="70px;" /> 
                                                        @else
                                                        <?php $produtc_image = \App\Product::find($product->product_id)->image; ?>
                                                        @if($produtc_image)
                                                        <img src="{{URL::to('/') . '/images/products/' .$produtc_image}}" width="70px" height="70px;" /> 
                                                        @endif
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($product->seller_id != 0)
                                                        {{\App\Seller::find($product->seller_id)->trade_name}}
                                                        @else
                                                        متجر المالكي
                                                        @endif
                                                    </td>
                                                    <td class="text-center"> {{$product->price}}</td>
                                                    <td class="text-center">
                                                        <?php $size = \App\Product::find($product->product_id)->size_id; ?>
                                                        @if($color_size_data != null && $color_size_data->size_id != 0)
                                                        {{\App\Size::find($color_size_data->size_id)->name}}
                                                        @elseif($size != 0)
                                                        {{\App\Size::find($size)->name}}
                                                        @else
                                                        {{"-"}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center"> {{$product->qty}}</td>
                                                </tr>
                                                @endforeach
<!--                                                <tr>
                                                    <td class="text-center" colspan="2"> اجمالي المشتريات</td>
                                                    <td class="text-center" colspan="3">{{$order->total_price}} ر .س</td>
                                                </tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
@stop