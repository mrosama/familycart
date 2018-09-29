@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')
<div class="clearfix visible-xs"></div>
<div class="col-md-9 col-sm-8 col-xs-12">
    <div class="search-results-hd">
        <h4 class="user-prof-name"> <i class="fa fa-user"></i> {{trans('lang.personal_details')}}</h4>
        <div class="user-prof-con">

            {{Form::open(array('route' => array('updateProfile', $user->id) , 'class' => 'form-horizontal user-profile-form' , "role" => "form" , 'files'=>TRUE , 'method'=>'post' ))}}

            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;"><strong>شكرا لك !</strong>{{Session::get('success')}}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger"  style="text-align: right;"><strong>خطأ !</strong>{{Session::get('error')}}</div>
            @endif

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label pull-right">{{trans('lang.name')}}</label>
                <div class="col-sm-9">
                    {{ Form::text('name' , $user->name , array('class' => 'form-control'))}}
                    <div style="color:red;">{{$errors->first('name')}}</div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label pull-right">{{trans('lang.email')}}</label>
                <div class="col-sm-9">
                    {{ Form::text('email' , $user->email , array('class' => 'form-control'))}}
                    <div style="color:red;">{{$errors->first('email')}}</div>
                </div>
            </div>

            <div class="form-group">
                <label for="mobile" class="col-sm-3 control-label pull-right">{{trans('lang.mobile')}}</label>
                <div class="col-sm-9">
                    {{Form::text('mobile' , $user->mobile , array('class' => 'form-control' , 'id'=>'getMobile'))}}
                    <div style="color:red;">{{$errors->first('mobile')}}</div>
                </div>
            </div>

            {{Form::hidden('id' , Auth::id())}}
            <div class="form-group">
                <div class="col-sm-9 text-center pull-left">
                    <input class="btn btn-primary" type="submit" value="{{trans('lang.edit')}}">
                </div>
            </div>
            {{Form::close()}}
        </div>

        <h4 class="user-prof-name"> <i class="fa fa-lock"></i>{{trans('lang.changePassword')}}</h4>

        <div class="user-prof-con">
            {{Form::open(['route' =>'changePass' , 'class' => 'form-horizontal user-profile-form' , "role" => "form" , 'method'=>'post' ])}}

            @if (Session::has('global_s')) 
            <div class="col-sm-12">
                @if($lang == 'en')
                <div class="alert alert-success"  style="text-align: left;"><strong>Thanks!</strong>{{Session::get('global_s')}}</div>
                @else
                <div class="alert alert-success"  style="text-align: right;"><strong>شكرا لك !</strong>{{Session::get('global_s')}}</div>
                @endif
            </div>
            @endif
            @if (Session::has('global_r'))
            <div class="col-sm-12">
                @if($lang == 'en')
                <div class="alert alert-danger"  style="text-align: left;"><strong> Error ! </strong>{{Session::get('global_r')}}</div>
                @else
                <div class="alert alert-danger"  style="text-align: right;"><strong> خطأ !  </strong>{{Session::get('global_r')}}</div>
                @endif
            </div>
            @endif

            <div class="form-group">
                <label for="old_password" class="col-sm-3 control-label pull-right">{{trans('lang.old_password')}}</label>
                <div class="col-sm-9">
                    <input type="password" name="old_password" class="form-control" id="inputPassword3"> 
                    <font color="red">{{$errors->first('old_password')}}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label pull-right">{{trans('lang.new_password')}}</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputPassword3"> 
                    <font color="red">{{$errors->first('password')}}</font>
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label pull-right">{{trans('lang.confirm_password')}}</label>
                <div class="col-sm-9">
                    <input type="password" name="password_confirmation" class="form-control" id="inputPassword3" > 
                    <font color="red">{{$errors->first('password_confirmation')}}</font>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 text-center pull-left">
                    <input class="btn btn-primary" type="submit" value="{{trans('lang.edit')}}">
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