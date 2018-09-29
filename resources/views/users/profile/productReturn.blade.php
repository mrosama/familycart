@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')
<div class="clearfix visible-xs"></div>
<div class="col-md-9 col-sm-8 col-xs-12">
    <div class="search-results-hd">
        <h4 class="user-prof-name"> <i class="fa fa-star"></i> {{trans('lang.productReturn')}}</h4>
        <div class="user-prof-con">
            {{Form::open(['url' => 'profile/return' , 'method' => 'post' ,  'class' => 'form-horizontal user-profile-form'])}}
            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;"><strong>شكرا لك !</strong>{{Session::get('success')}}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger"  style="text-align: right;"><strong>خطأ !</strong>{{Session::get('error')}}</div>
            @endif
            <div class="form-group">
                <label  class="col-sm-3 control-label pull-right">{{trans('lang.product_name')}}</label>
                <div class="col-sm-9">
                    @if($lang == 'en')
                    {{$order_product->name_en}}
                    @else
                    {{$order_product->name_ar}}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label pull-right">{{trans('lang.causeFlashBacks')}}</label>
                <div class="col-sm-9">
                    {{Form::textarea('causeFlashBacks' , '' , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('causeFlashBacks')}}</div>
                </div>
            </div>
            {{Form::hidden('lang' , App::getLocale())}}
            {{Form::hidden('user_id' , Auth::id())}}
            {{Form::hidden('product_id' , $order_product->product_id)}}
            {{Form::hidden('order_id' , $order_product->order_id)}}
            <div class="form-group">
                <div class="col-sm-9 text-center pull-left">
                    <input class="btn btn-primary" type="submit" value="{{trans('lang.send')}}">
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div> 
</div>
</div>
</section>

@stop