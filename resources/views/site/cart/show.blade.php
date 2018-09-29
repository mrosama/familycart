@extends('site.layouts.master')
@section('content')

@if(Cart::count() > 0)
<section id="main-basket" class="dir-rtl">
    <div class="container">
        <h2>{{trans('lang.shopping_cart')}}</h2><h3 class="text-muted" id="product_num">({{Cart::count()}} {{trans('lang.products')}} )</h3>
        <div class="main-basket-con">
            @foreach($cart_content as $row)
            @if($row->options->color_size_id)
            <?php $color_size_data = \App\Product_colors_size::find($row->options->color_size_id); ?>
            @else
            <?php $color_size_data = null; ?>
            @endif
            <div class="bask-item">
                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <div class="prod-img">
                            @if(isset($color_size_data))
                            <img src="{{URL::to('/images/products').'/'.$color_size_data->image}}" alt="offer image" class="img-thumbnail">
                            @else
                            <img src="{{URL::to('/images/products').'/'.$row->options->image}}" alt="offer image" class="img-thumbnail">
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="text-center">
                            <h5><strong>
                                    <p>
                                        @if(isset($color_size_data))
                                        @if($lang == 'en')
                                        {{ $color_size_data->name_en}}
                                        @else
                                        {{ $color_size_data->name_ar}}
                                        @endif
                                        @else
                                        @if($lang == 'en')
                                        {{$row->options->name_en}}
                                        @else
                                        {{$row->name}}
                                        @endif
                                        @endif
                                    </p>
                                </strong></h5>
                        </div>

                    </div>
                    <div class="col-sm-2 col-xs-12">
                        @if(isset($color_size_data) && $color_size_data->size_id != 0)
                        <h5><strong>{{trans('lang.size')}} : {{\App\Size::find($color_size_data->size_id)->name}}</strong></h5>
                        @elseif(!isset($color_size_data))
                        <h5><strong>{{trans('lang.size')}}  : <?php
                                $size_id = \App\Product::find($row->id)->size_id;
                                if ($size_id != 0) {
                                    $size_name = \App\Size::find($size_id)->name;
                                    echo $size_name;
                                }
                                else
                                    echo 'os'; 
                                ?> </strong></h5>
                        @else
                        <h5><strong>{{trans('lang.size')}} : os</strong></h5>
                        @endif
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <form action="#" class="form-inline" >
                            <label for="quantity" class="control-label"> {{trans('lang.quantity')}}</label>
                            <input type="hidden" name="product_id" id="product_id" value="{{$row->id}}" />
                            <input type="hidden" name="rowId" id="rowId" value="{{$row->rowId}}" />
                            <!-- if have color or size -->
                            @if(isset($color_size_data))
                            <input type="hidden" name="color_size_id" id="rowId" value="{{$color_size_data->id}}" />
<?php $product_qty = \App\Product_colors_size::find($color_size_data->id)->quantity; ?>
                            <select name="quantity" id="quantity" class="form-control">
                                @if($product_qty >= 3)
                                <option value="1" <?php
if ($row->qty == 1) {
    echo 'selected';
}
?> >1</option>
                                <option value="2" <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                <option value="3"  <?php
                                        if ($row->qty == 3) {
                                            echo 'selected';
                                        }
                                        ?>>3</option>
                                @elseif($product_qty >= 2)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                <option value="2"  <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                @elseif($product_qty >= 1)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                @endif
                            </select>

                            <!-- if have seller id -->
                            @elseif($row->options->seller_id)
                            <input type="hidden" name="seller_id" id="rowId" value="{{$row->options->seller_id}}" />
<?php $product_qty = \App\Product_seller::where([ 'seller_id' => $row->options->seller_id, 'product_id' => $row->id])->first()->quantity; ?>
                            <select name="quantity" id="quantity" class="form-control">
                                @if($product_qty >= 3)
                                <option value="1" <?php
if ($row->qty == 1) {
    echo 'selected';
}
?> >1</option>
                                <option value="2" <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                <option value="3"  <?php
                                        if ($row->qty == 3) {
                                            echo 'selected';
                                        }
                                        ?>>3</option>
                                @elseif($product_qty >= 2)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                <option value="2"  <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                @elseif($product_qty >= 1)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                @endif
                            </select>
                            @else
<?php $product_qty = \App\Product::find($row->id)->quantity; ?>
                            <select name="quantity" id="quantity" class="form-control">
                                @if($product_qty >= 3)
                                <option value="1" <?php
if ($row->qty == 1) {
    echo 'selected';
}
?> >1</option>
                                <option value="2" <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                <option value="3"  <?php
                                        if ($row->qty == 3) {
                                            echo 'selected';
                                        }
                                        ?>>3</option>
                                @elseif($product_qty >= 2)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                <option value="2"  <?php
                                        if ($row->qty == 2) {
                                            echo 'selected';
                                        }
                                        ?>>2</option>
                                @elseif($product_qty >= 1)
                                <option value="1"  <?php
                                if ($row->qty == 1) {
                                    echo 'selected';
                                }
                                        ?>>1</option>
                                @endif
                            </select>
                            @endif
                        </form>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <h5><strong>{{trans('lang.price')}} :</strong></h5>
                        <div class="prod-salary">
                            <div class="row">
                                @if(isset($color_size_data))
                                <div class="col-xs-12  text-muted">@if($color_size_data->original_price != 0) {{$color_size_data->original_price}} {{trans('lang.SR')}} @endif  </div>
                                <div class="col-xs-12">   {{$color_size_data->discount_price}} {{trans('lang.SR')}}</div>
                                @else
                                <div class="col-xs-12  text-muted">@if($row->options->original_price != 0) {{$row->options->original_price}} {{trans('lang.SR')}} @endif  </div>
                                <div class="col-xs-12">   {{$row->price}} {{trans('lang.SR')}}</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="delete-basket">
                    <a href="{{URL::to('/cart/remove_item').'/'.$row->rowId}}"><i class="fa fa-trash"></i>{{trans('lang.remove_from_cart')}}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="main-basket-finsih">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pull-right col-xs-12">
                        <div class="bask-item">
                            <div class="row">
                                <div class="pull-right col-sm-6">
                                    <p class="bold-hd">{{trans('lang.total')}}</p>
                                </div>
                                <div class="pull-left col-sm-6 ">
                                    <p class="bold-hd" id="cart_sum">{{Cart::subtotal()}} {{trans('lang.SR')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="bask-finish-btn">
                            <div class="row">
                                <br/>
                                <div class="col-xs-12">
                                    <a href="{{URL::to('/').'/'.$lang.'/shipping'}}" title="{{trans('lang.proceedToPay')}}" class="btn btn-success btn-block"><i class="fa fa-shopping-cart"></i>  {{trans('lang.proceedToPay')}}</a>
                                </div>
                                <div class="col-xs-12">
                                    <a href="{{URL::to('/').'/'.$lang}}" title="{{trans('lang.continueShopping')}}" class="btn btn-warning btn-block"><i class="fa fa-shopping-basket"></i> {{trans('lang.continueShopping')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@else
<section id="main-basket" class="dir-rtl">
    <div class="container text-center">
        <h2>{{trans('lang.cart_empty')}} <i class="fa fa-frown-o"></i></h2>
        <br>
        <h4><a href="{{URL::to('/'.$lang)}}"> {{trans('lang.back_to_home')}}  <i class="fa fa-home"></i></a></h4>
        <br>

    </div>
</section>
@endif
@stop