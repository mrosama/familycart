@extends('site.layouts.master')
@section('content')
<section id="main-search" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a id="buy-toggle" class="badge visible-xs pull-left"><i class="fa fa-plus fa-lg"></i></a>
                <div class="buy-finish">
                    <div class="buy-basket-items">
                        <div class="buy-head">
                            {{trans('lang.reviewYourOrder')}}<span>({{Cart::count()}} {{trans('lang.products')}} )</span>
                        </div>
                        <div class="buy-content">
                            @if(Cart::count() > 0)
                            @foreach(Cart::content() as $row)
                            <div class="buy-con-item">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <h6>
                                            <p>
                                                @if($lang == 'en')
                                                {{$row->options->name_en}}
                                                @else
                                                {{$row->name}}
                                                @endif
                                            </p>
                                        </h6>
                                        <h6>{{trans('lang.quantity')}} : {{$row->qty}}</h6>
                                        <h6>{{trans('lang.size')}} : 
                                            @if($row->options->color_size_id)
                                            <?php $color_size_data = \App\Product_colors_size::find($row->options->color_size_id); ?>
                                            @else
                                            <?php $color_size_data = null; ?>
                                            @endif
                                            @if(isset($color_size_data) && $color_size_data->size_id != 0)
                                            {{\App\Size::find($color_size_data->size_id)->name}}
                                            @elseif(!isset($color_size_data))
                                            <?php
                                            $size_id = \App\Product::find($row->id)->size_id;
                                            if ($size_id != 0) {
                                                $size_name = \App\Size::find($size_id)->name;
                                                echo $size_name;
                                            } else
                                                echo 'os';
                                            ?> </strong></h5>
                                            @else
                                            os
                                            @endif
                                        </h6>
                                        <h6 class="link-active"><strong>{{trans('lang.price')}} : {{$row->price}} {{trans('lang.SR')}}</strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <img src="{{URL::to('/').'/images/products/'.$row->options->image}}" alt="{{$row->name_ar}}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="discount-cart">
                            <!--                            <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-search" type="button">{{trans('lang.apply')}}</button>
                                                            </span>
                                                            <input type="text" class="form-control dir-rtl" placeholder="{{trans('lang.enterCouponCode')}}">
                                                        </div> /input-group -->
                        </div>
                        <div class="buy-total">

                            <p id="sum"><strong> {{trans('lang.sum')}} :</strong>  {{Cart::subtotal()}} {{trans('lang.SR')}}</p>

                            @if(Session::has('gift'))
                            <p id="have_gift"><strong>{{trans('lang.gift')}} :</strong> 20 {{trans('lang.SR')}}</p>
                            @else
                            <p id="have_gift" style="display:none;"><strong>{{trans('lang.gift')}} :</strong> 20 {{trans('lang.SR')}}</p>
                            @endif

                            @if(Session::has('fastCharge'))
                            <p id="fast_charge" ><strong>{{trans('lang.fastCharge')}} :</strong> 20 {{trans('lang.SR')}}</p>
                            @else
                            <p id="fast_charge" style="display:none;"><strong>{{trans('lang.fastCharge')}}:</strong> 20 {{trans('lang.SR')}}</p>
                            @endif


                            @if(Auth::user())
                            @if(!empty($shipping_data) && isset($shipping_data))
                            <?php $charge_value = \App\City::find($shipping_data->city_id)->charge_value; ?>
                            @if(!empty($charge_value))
                            <p id="charge"><strong>{{trans('lang.charge')}}:</strong> {{$charge_value}} {{trans('lang.SR')}}</p>
                            <input type="hidden" id="chargeValue" value="{{$charge_value}}" />
                            @endif
                            @endif
                            @endif

                            <h4>
                                <strong>{{trans('lang.total')}} : </strong> 
                                <span id="total_with_gift">
                                    @if(Session::has('gift') && Session::has('fastCharge'))
                                    <?php
                                    $CartTotal = Cart::subtotal();
                                    $CartTotal = str_replace(',', '', $CartTotal);
                                    $CartTotal = (float) $CartTotal + 20 + 20;
                                    if (isset($charge_value) && !empty($charge_value)) {
                                        echo $CartTotal + $charge_value;
                                    } else {
                                        echo $CartTotal;
                                    }
                                    ?>
                                    @elseif(Session::has('gift') || Session::has('fastCharge'))  
                                    <?php
                                    $CartTotal = Cart::subtotal();
                                    $CartTotal = str_replace(',', '', $CartTotal);
                                    $CartTotal = (float) $CartTotal + 20;
                                    if (isset($charge_value) && !empty($charge_value)) {
                                        echo $CartTotal + $charge_value;
                                    } else {
                                        echo $CartTotal;
                                    }
                                    ?>
                                    @else
                                    <?php
                                    if (isset($charge_value) && !empty($charge_value)) {
                                        $CartTotal = Cart::subtotal();
                                        $CartTotal = str_replace(',', '', $CartTotal);
                                        $CartTotal = (float) $CartTotal + $charge_value;
                                        echo $CartTotal;
                                    } else {
                                        echo Cart::subtotal();
                                    }
                                    ?>
                                    @endif
                                </span> 
                                {{trans('lang.SR')}}
                            </h4>
                        </div>
                        <div class="text-center">
                            <a href="#"><img src="{{URL::to('/site_template')}}/assets/img/visa.png" alt="visa" class="pay-img"></a>
                            <a href="#"><img src="{{URL::to('/site_template')}}/assets/img/MasterCard.png" alt="MasterCard" class="pay-img"></a>
                            <a href="#"><img src="{{URL::to('/site_template')}}/assets/img/mda.jpg" alt="mda" class="pay-img"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="buying-zone">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <h4><strong>@if(Auth::user())<span class=" circle-no-o">@else <span class=" circle-no">@endif 1</span>{{trans('lang.loginOrGuest')}}</strong>
                                        <i class="fa fa-user pull-left text-muted fa-lg"></i></h4>
                                </h4>
                            </div>
                            <div>
                                <div class="panel-body">
                                    @if(Auth::user())
                                    <form action="#" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2" style="@if($lang == 'en')float:left;@else float:right; @endif">{{trans('lang.account')}}:</label>
                                            <label class="col-md-2" style="@if($lang == 'en')float:left;@else float:right; @endif">{{Auth::user()->email}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12" style="@if($lang == 'en')float:left;@else float:right; @endif">{{trans('lang.logged_in')}}<a href="{{URL::to('/logout')}}" title="{{trans('lang.anotherAccount')}}">{{trans('lang.anotherAccount')}}</a></label>
                                        </div>
                                    </form>
                                    @else
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label> <input type="checkbox"  id="have_pass" value="">{{trans('lang.havePassword')}}</label>
                                        </div>
                                    </div>
                                    <div id="visitor_login">
                                        {{Form::open(array('url' => 'visitor_login' , 'method' =>'post' , 'class' => 'form-horizontal')) }}
                                        <div class="form-group">
                                            <input type="email" id="buyer-email" name="email" class="form-control" placeholder="{{trans('lang.customerEmail')}}">
                                            <button type="submit" class="btn btn-warning continue-btn show-div"  id="btn-con">{{trans('lang.continue')}}</button>
                                            <br> <font color="red">{{$errors->first('email')}}</font>
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                    <div id="user_login" style="display:none;">
                                        {{Form::open(array('url' => 'shippingLogin' , 'method' =>'post' , 'class' => 'form-horizontal')) }}
                                        <div class="form-group">
                                            <input type="email" id="buyer-email" name="email" class="form-control" placeholder="{{trans('lang.customerEmail')}}">
                                        </div>
                                        <div class="form-group" >
                                            <input type="password" id="buyer-password" name="password" class="form-control" placeholder="{{trans('lang.customerPassword')}}">
                                            <button type="submit" class="btn btn-warning continue-btn" style="width:auto;">{{trans('lang.login')}}</button>
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    @if(Auth::user())
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        <h4><strong><span class="circle-no">2</span>{{trans('lang.shipping_details')}}</strong>
                                            <i class="fa fa-truck pull-left text-muted fa-lg"></i></h4></a>
                                    @else
                                    <h4><strong><span class="circle-no-o">2</span>{{trans('lang.shipping_details')}}</strong>
                                        <i class="fa fa-truck pull-left text-muted fa-lg"></i></h4>
                                    @endif
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse <?php
                            if (Auth::user()) {
                                echo "in";
                            }
                            ?>">
                                <div class="panel-body">
                                    @if(!empty($shipping_data) && isset($shipping_data))
                                    {{Form::open(array('url' => ['/shipping/update', $shipping_data->id], 'method' => 'post' , 'class' => 'form-horizontal'))}}
                                    <div class="form-group">
                                        <div class="checkbox">
                                            @if(Session::has('fastCharge'))
                                            <label> <input type="checkbox" checked="" id="fastCharge" value="">  {{trans('lang.fastCharge')}}<strong> 20 {{trans('lang.SR')}}</strong></label>
                                            @else
                                            <label> <input type="checkbox" id="fastCharge" value=""> {{trans('lang.fastCharge')}}<strong> 20 {{trans('lang.SR')}}</strong></label>
                                            @endif
                                        </div>
                                        <div class="checkbox">
                                            @if(Session::has('gift'))
                                            <label> <input type="checkbox" checked="" id="gift" value=""> {{trans('lang.txtGiftWrapOption')}}<strong>20 {{trans('lang.SR')}}</strong></label>
                                            @else
                                            <label> <input type="checkbox" id="gift" value=""> {{trans('lang.txtGiftWrapOption')}}<strong>20 {{trans('lang.SR')}}</strong></label>
                                            @endif
                                        </div>
                                    </div>  
                                    @if(Session::has('gift'))
                                    <div class="form-group" id="gift-message" >
                                        <textarea  cols="30" rows="5" name="gift_text"  class="form-control" placeholder="{{trans('lang.giftMessage')}}">{{ Session::get('gift_text') }}</textarea>
                                        <font color="red">{{$errors->first('gift_text')}}</font><br>
                                    </div>
                                    @else
                                    <div class="form-group hide-div" id="gift-message" >
                                        <textarea  cols="30" rows="5" name="gift_text" class="form-control" placeholder="{{trans('lang.giftMessage')}}"></textarea>
                                        <font color="red">{{$errors->first('gift_text')}}</font><br>
                                    </div>
                                    @endif
                                    <h4>{{trans('lang.newShippingAddress')}}</h4><hr>
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-3 control-label pull-right">{{trans('lang.fullName')}} *</label>
                                        <div class="col-sm-9" id="show_name">
                                            {{ $shipping_data->full_name}}
                                        </div>
                                        <div class="col-sm-9" id="edit_name" style="display:none;">
                                            <input class="form-control" required="" name="full_name" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->full_name ?>" placeholder="{{trans('lang.fullName')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.address')}} *</label>
                                        <div class="col-sm-9" id="show_address">
                                            {{$shipping_data->address}}
                                        </div>
                                        <div class="col-sm-9" id="edit_address" style="display:none;"> 
                                            <input class="form-control" required="" name="address" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->address ?>" placeholder="{{trans('lang.address')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedCity" class="col-sm-3 control-label pull-right">{{trans('lang.country')}} *</label>
                                        <div class="col-sm-9" id="show_country">
                                            <?php $country = \App\Country::find($shipping_data->country_id); ?>
                                            @if(!empty($country))
                                            @if($lang == 'en')
                                            {{$country->name_en}}
                                            @else
                                            {{$country->name_ar}}
                                            @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-9" id="edit_country" style="display:none;">
                                            @if (!empty($shipping_data) && !empty($country))
                                            {{Form::select('country_id' , $countries ,  $shipping_data->country_id , ['placeholder' => trans('lang.selectCountry') , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                                            @else
                                            {{Form::select('country_id' , $countries ,  '' , ['placeholder' => trans('lang.selectCountry') , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedCity" class="col-sm-3 control-label pull-right">{{trans('lang.city')}} *</label>
                                        <div class="col-sm-9" id="show_city">
                                            <?php $city = \App\City::find($shipping_data->city_id); ?>
                                            @if(!empty($city))
                                            @if($lang == 'en')
                                            {{$city->name_en}}
                                            @else
                                            {{$city->name_ar}}
                                            @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-9" id="edit_city" style="display:none;">
                                            @if (!empty($shipping_data) && !empty($city))
                                            {{Form::select('city_id' , $cities ,  $shipping_data->city_id , ['placeholder' => trans('lang.selectCity') , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                                            @else
                                            {{Form::select('city_id' , ['' => trans('lang.selectCity')] , '' , ['id' => 'city_id' , 'required' , 'class' =>'form-control'])}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label pull-right">{{trans('lang.mobile')}} *</label>
                                        <div class="col-sm-9" id="show_mobile">
                                            {{ $shipping_data->mobile}}
                                        </div>
                                        <div class="col-sm-9" id="edit_mobile" style="display:none;">
                                            <input class="form-control" required="" placeholder="{{trans('lang.mobile')}}" id="getMobile" name="mobile" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->mobile ?>" style="border-radius: 4px;">
                                        </div>
                                    </div>
                                    <button type="submit" class="info-btn-fav pull-left"> {{trans('lang.proceedToPay')}}</button>
                                    <button type="button" class="info-btn-fav pull-left" onclick="return shippingEdit();">{{trans('lang.editShippingData')}}</button>
                                    {{Form::close()}}
                                    @else
                                    {{Form::open(array('url' => '/shipping/store' , 'method' => 'post' , 'class' => 'form-horizontal'))}}
                                    <div class="form-group">
                                        <div class="checkbox">
                                            @if(Session::has('fastCharge'))
                                            <label> <input type="checkbox" checked="" id="fastCharge" value="">  {{trans('lang.fastCharge')}}<strong> 20 {{trans('lang.SR')}}</strong></label>
                                            @else
                                            <label> <input type="checkbox" id="fastCharge" value=""> {{trans('lang.fastCharge')}}<strong> 20 {{trans('lang.SR')}}</strong></label>
                                            @endif
                                        </div>
                                        <div class="checkbox">
                                            @if(Session::has('gift'))
                                            <label> <input type="checkbox" checked="" id="gift" value=""> {{trans('lang.txtGiftWrapOption')}}<strong>20 {{trans('lang.SR')}}</strong></label>
                                            @else
                                            <label> <input type="checkbox" id="gift" value=""> {{trans('lang.txtGiftWrapOption')}} <strong> 20 {{trans('lang.SR')}}</strong></label>
                                            @endif
                                        </div>
                                    </div>  
                                    @if(Session::has('gift'))
                                    <div class="form-group" id="gift-message" >
                                        <textarea  cols="30" rows="5" name="gift_text" class="form-control" placeholder="{{trans('lang.giftMessage')}}">{{ Session::get('gift_text') }}</textarea>
                                        <font color="red">{{$errors->first('gift_text')}}</font><br>
                                    </div>
                                    @else
                                    <div class="form-group hide-div" id="gift-message" >
                                        <textarea  cols="30" rows="5" name="gift_text" class="form-control" placeholder="{{trans('lang.giftMessage')}}"></textarea>
                                        <font color="red">{{$errors->first('gift_text')}}</font><br>
                                    </div>
                                    @endif

                                    <h4>{{trans('lang.newShippingAddress')}}</h4><hr>
                                    <div class="form-group">
                                        <label for="full_name" class="col-sm-3 control-label pull-right">{{trans('lang.fullName')}} *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" name="full_name" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->full_name ?>" placeholder="{{trans('lang.fullName')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.address')}} *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" name="address" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->address ?>" placeholder="{{trans('lang.address')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedCity" class="col-sm-3 control-label pull-right">{{trans('lang.country')}} *</label>
                                        <div class="col-sm-9">
                                            @if (!empty($shipping_data) && !empty($shipping_data->country_id))
                                            {{Form::select('country_id' , $countries ,  $shipping_data->country_id , ['placeholder' => trans('lang.selectCountry') , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                                            @else
                                            {{Form::select('country_id' , $countries ,  '' , ['placeholder' => trans('lang.selectCountry') , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedCity" class="col-sm-3 control-label pull-right"> {{trans('lang.city')}} *</label>
                                        <div class="col-sm-9">
                                            @if (!empty($shipping_data) && !empty($shipping_data->city_id))
                                            {{Form::select('city_id' , $cities ,  $shipping_data->city_id , ['placeholder' => trans('lang.selectCity') , 'id' => 'city_id' , 'required' , 'class' =>'form-control'])}}
                                            @else
                                            {{Form::select('city_id' , ['' =>  trans('lang.selectCountryFirst') ] , '' , ['id' => 'city_id' , 'required' , 'class' =>'form-control'])}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label pull-right">{{trans('lang.mobile')}} *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" placeholder="{{trans('lang.mobile')}}" id="getMobile" name="mobile" type="text" value="<?php if (!empty($shipping_data)) echo $shipping_data->mobile ?>" style="border-radius: 4px;">
                                        </div>
                                    </div>
                                    <button type="submit"  class="info-btn-fav pull-left">{{trans('lang.proceedToPay')}}</button>
                                    {{Form::close()}}
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    @if(Auth::user() && !empty($shipping_data) && isset($shipping_data))
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        <i class="fa fa-usd pull-left text-muted fa-lg"></i><h4><strong><span class="circle-no">3</span>{{trans('lang.payment')}}</strong>
                                        </h4></a>
                                    @else
                                    <i class="fa fa-usd pull-left text-muted fa-lg"></i><h4><strong><span class="circle-no-o">3</span>{{trans('lang.payment')}}</strong>
                                    </h4>
                                    @endif
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse <?php
                            if (Auth::user() && !empty($shipping_data) && isset($shipping_data)) {
                                echo "in";
                            }
                            ?>">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            {{Form::open(array('url' => '/checkout/pay' , 'method' => 'post' , 'class' =>'form-horizontal' , 'files' => true))}}
                                            <p class="bold-hd">{{trans('lang.selectPaymentMethod')}}</p>
                                            <font color="red">{{$errors->first('pay_type')}}</font>
                                            <!--<input type="radio" name="pay" value="visacards">-->
                                            {{trans('lang.usingCreditCard')}}:<br>
                                            <div class="pay-options">
                                                <!--<input type="radio" name="payment_method" value="visa">-->
                                                <img src="{{URL::to('/site_template')}}/assets/img/visa.png" alt="visa" class="pay-img">
                                                <!--<input type="radio" name="payment_method" value="master">-->
                                                <img src="{{URL::to('/site_template')}}/assets/img/MasterCard.png" alt="MasterCard" class="pay-img">  
                                            </div> 
                                            <br>
                                            <input type="radio" name="payment_method" checked=""  value="cash"> {{trans('lang.bankTransfer')}}
                                            <img src="{{URL::to('/site_template')}}/assets/img/mda.jpg" alt="mda" class="pay-img"><br>
                                            <label>{{trans('lang.attachPhoto')}}</label><input type="file" name="transfer_image">
                                            <font color="red">{{$errors->first('transfer_image')}}</font><br>
                                            <br>
                                            @if(isset($shipping_data))
                                            <input type="hidden" name="shipping_id" value="{{$shipping_data->id}}"/>
                                            @endif
                                            <button type="submit" class="btn btn-success" >{{trans('lang.pay_now')}}</button>
                                            {{Form::close()}}
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


</section>


@stop