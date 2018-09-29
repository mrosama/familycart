@extends('site.layouts.master')
@section('content')
<style>
    @media (min-width: 992px)
    {
        .col-md-10{
            width: 65.333333%;
            direction: rtl;
            float: right;
        }
        .col-md-2{
            margin-right: 65px;
        }
    }
</style>
<section id="main-register">
    <div class="container">
        <div class="row dir-rtl">
            <div class="col-md-2 col-sm-3 pull-right">
                <ul class="user-prof-list">
                    <li><a href="{{URL::to('forgetPassword')}}"><i class="fa fa-tag"></i> {{trans('lang.changePassword')}}</a></li>
                </ul>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-10 col-sm-9">
                <div class="login-part">
                    <div class="login-header">
                        <h3 class="login-hd"><i class="fa fa-lock"></i> {{trans('lang.changePassword')}}</h3>
                    </div>

                    @if (Session::get('error'))
                    <div class="text-center" >
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    </div>
                    @endif

                    @if (Session::get('success'))
                    <div class="text-center" >
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    </div>
                    @endif

                    <div class="form-bottom">
                        {{ Form::open(array('url' => $lang.'/resetPassword' ,'class' => 'form-horizontal user-profile-form')) }}

                        
                        {{Form::hidden('lang' , $lang)}}
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label pull-right">{{trans('lang.new_password')}}</label>
                            <div class="col-sm-9">
                                {{ Form::password('password' , array('class' => 'form-control' , 'placeholder' => trans('lang.new_password')))}}
                                <div style="color:red;">{{$errors->first('password')}}</div><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-3 control-label pull-right">{{trans('lang.confirm_password')}}</label>
                            <div class="col-sm-9">
                                {{ Form::password('password_confirmation' , array('class' => 'form-control' , 'placeholder' => trans('lang.confirm_password')))}}
                                <div style="color:red;">{{$errors->first('password_confirmation')}}</div><br>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="{{trans('lang.changePassword')}}">
                        </div>
                        {{Form::close()}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@stop