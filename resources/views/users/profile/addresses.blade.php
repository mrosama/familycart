@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')

<div class="clearfix visible-xs"></div>
<div class="col-md-10 col-sm-9">
    <div class="login-part">
        <div class="login-header">
            <h3 class="login-hd"><i class="fa fa-book"></i> {{trans('lang.address_book')}}
                <a href="#" class="btn btn-warning pull-left"><i class="fa fa-plus-circle"></i> {{trans('lang.new_address')}}</a>
            </h3>
        </div>
        <div class="user-prof-con">
            <div class="user-profile-form">
                @if(count($addresses) > 0)
                @foreach($addresses as $row)
                @if($lang == 'en')
                <p>
                    @if($row->type == 'house')
                    <i class="fa fa-home"></i>
                    @elseif($row->type == 'office')
                    <i class="fa fa-building"></i>
                    @endif
                    {{$row->getCountry->name_en}}  - {{$row->getCity->name_en}} , {{$row->address}} </p>
                @else
                <p> 
                    @if($row->type == 'house')
                    <i class="fa fa-home"></i>
                    @elseif($row->type == 'office')
                    <i class="fa fa-building"></i>
                    @endif
                    {{$row->getCountry->name_ar}}  - {{$row->getCity->name_ar}} , {{$row->address}} </p>
                @endif
                <p>{{$row->mobile}}</p>
                <p>
                    <a href="{{URL::to('/').'/'.$lang.'/profile/addresses/edit/'.$row->id}}" class="btn-muted"><i class="fa fa-pencil"></i>{{trans('lang.edit')}}</a>
                    <a href="{{URL::to('/profile/addresses/delete').'/'.$row->id}}"  class="btn-muted"><i class="fa fa-trash"></i>{{trans('lang.delete')}}</a>
                </p>
                @endforeach
                @else
                <p>{{trans('lang.no_address')}} </p>
                @endif

            </div>
        </div>
        <div class="login-header">
            <h3 class="login-hd"><i class="fa fa-plus-circle"></i> {{trans('lang.new_address')}}</h3>
        </div>
        <div class="user-prof-con">
            {{Form::open(array('url' => 'profile/addresses/create' , 'method' => 'post' , 'class' => 'form-horizontal user-profile-form'))}}

            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;">{{Session::get('success')}}</div>
            @endif
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.type')}}</label>
                <div class="col-sm-9">
                    {{Form::select('type' , ['' => '...' , 'house' => trans('lang.house') , 'office' => trans('lang.office')] , '' , ['class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('type')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label pull-right">{{trans('lang.first_name')}}</label>
                <div class="col-sm-9">
                    {{Form::text('first_name' , '' , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('first_name')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="familyname" class="col-sm-3 control-label pull-right">{{trans('lang.last_name')}}</label>
                <div class="col-sm-9">
                    {{Form::text('last_name' , '' , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('last_name')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label pull-right">{{trans('lang.address')}}</label>
                <div class="col-sm-9">
                    {{Form::text('address' , '' , ['class' => 'form-control'])}}
                    <div style="color:red;">{{$errors->first('address')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="country_id" class="col-sm-3 control-label pull-right">{{trans('lang.country')}}</label>
                <div class="col-sm-9">
                    {{Form::select('country_id' , $countries ,  '' , ['placeholder' => 'اختر البلد ...' , 'id' => 'country_id' , 'required' , 'class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('country_id')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-3 control-label pull-right">{{trans('lang.city')}}</label>
                <div class="col-sm-9">
                    {{Form::select('city_id' , ['' => 'اختر البلد اولا...'] , '' , ['id' => 'city_id' , 'required' , 'class' =>'form-control'])}}
                    <div style="color:red;">{{$errors->first('city_id')}}</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label pull-right">{{trans('lang.mobile')}}</label>
                <div class="col-sm-9">
                    {{Form::text('mobile' , '' , ['class' => 'form-control' , "style"=>"border-radius: 4px;"])}}
                    <div style="color:red;">{{$errors->first('mobile')}}</div>
                </div>
            </div>
            <br/>
            <div>
                <input type="checkbox" value="1">
                {{trans('lang.default_shipping')}}
            </div>
            <br/>
            <div>
                <input type="checkbox" value="1">
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