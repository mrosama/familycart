@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')

<div class="clearfix visible-xs"></div>
<div class="col-md-9 col-sm-8 col-xs-12">
    <div class="search-results-hd">
        <h4 class="user-prof-name"> <i class="fa fa-star"></i> {{trans('lang.product_reviews')}}</h4>
        <div class="user-prof-con">
            @if($product_rate)
            {{Form::open(['url' => '' , 'method' => 'post' ,  'class' => 'form-horizontal user-profile-form'])}}
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.product_name')}}</label>
                <div class="col-sm-9">
                    @if($lang == 'en')
                    {{$product->name_en}}
                    @else
                    {{$product->name_ar}}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.stars')}}</label>
                <div class="col-sm-9">
                    {{$product_rate->star}}
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.rate_text')}}</label>
                <div class="col-sm-9">
                    {{$product_rate->rate_text}}
                </div>
            </div>
            {{Form::close()}}
            @else

            {{Form::open(['url' => 'profile/rating' , 'method' => 'post' ,  'class' => 'form-horizontal user-profile-form'])}}
            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;"><strong>شكرا لك !</strong>{{Session::get('success')}}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger"  style="text-align: right;"><strong>خطأ !</strong>{{Session::get('error')}}</div>
            @endif
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.product_name')}}</label>
                <div class="col-sm-9">
                    @if($lang == 'en')
                    {{$product->name_en}}
                    @else
                    {{$product->name_ar}}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.stars')}}</label>
                <div class="col-sm-9">
                    {{Form::select('star' , ['' => '...' , '1' => '1', '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5'] , '' , ['class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('star')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.rate_text')}}</label>
                <div class="col-sm-9">
                    {{Form::textarea('rate_text' , '' , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('rate_text')}}</div>
                </div>
            </div>
            {{Form::hidden('user_id' , Auth::id())}}
            {{Form::hidden('product_id' , $product_id)}}
            {{Form::hidden('order_id' , $order_id)}}
            <div class="form-group">
                <div class="col-sm-9 text-center pull-left">
                    <input class="btn btn-primary" type="submit" value="{{trans('lang.send')}}">
                </div>
            </div>
            {{Form::close()}}
            @endif
        </div>


    </div>
</div> 

</div>
</div>
</section>

@stop