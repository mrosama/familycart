@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')

<div class="clearfix visible-xs"></div>
<div class="col-md-10 col-sm-9">
    <div class="login-part">


        <div class="login-header">
            <h3 class="login-hd"><i class="fa fa-pencil"></i> {{trans('lang.edit_address')}}</h3>
        </div>
        <div class="user-prof-con">
            {{Form::open(array('url' => ['profile/addresses/update' , $address->id] , 'method' => 'post' , 'class' => 'form-horizontal user-profile-form'))}}

            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;">{{Session::get('success')}}</div>
            @endif
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.type')}}</label>
                <div class="col-sm-9">
                    {{Form::select('type' , ['' => '...' , 'house' => trans('lang.house') , 'office' => trans('lang.office')] , $address->type , ['class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('type')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label pull-right">{{trans('lang.first_name')}}</label>
                <div class="col-sm-9">
                    {{Form::text('first_name' ,  $address->first_name , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('first_name')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="familyname" class="col-sm-3 control-label pull-right">{{trans('lang.last_name')}}</label>
                <div class="col-sm-9">
                    {{Form::text('last_name' , $address->last_name , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('last_name')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.address')}}</label>
                <div class="col-sm-9">
                    {{Form::text('address' , $address->address , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('address')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.country')}}</label>
                <div class="col-sm-9">
                    {{Form::select('country_id' , $countries ,  $address->country_id , ['placeholder' => 'اختر البلد ...' , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('country_id')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-3 control-label pull-right">{{trans('lang.city')}}</label>
                <div class="col-sm-9">
                    {{Form::select('city_id' , $cities , $address->city_id , ['id' => 'city_id' , 'required' , 'class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('city_id')}}</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label pull-right">{{trans('lang.mobile')}}</label>
                <div class="col-sm-9">
                    {{Form::text('mobile' , $address->mobile , ['class' => 'form-control' , "style"=>"border-radius: 4px;"])}}
                    <div style="color:red;">{{$errors->first('mobile')}}</div>
                </div>
            </div>
            <br/>
            <div>
                @if($address->default_shipping == 1)
                <input type="checkbox" name="default_shipping" checked value="1">
                @else
                <input type="checkbox" name="default_shipping" value="1">
                @endif
                {{trans('lang.default_shipping')}}
            </div>
            <br/>
            <div>
                @if($address->default_billing == 1)
                <input type="checkbox" name="default_billing" checked value="1">
                @else
                <input type="checkbox" name="default_billing" value="1">
                @endif
                {{trans('lang.default_billing')}}
            </div>	

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input type="submit" class="btn btn-success btn-block" value="{{trans('lang.save_address')}}">
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