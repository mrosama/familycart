@extends('site.layouts.master')
@section('content')


<section id="main-register">
    <div class="container">
        <div class="row dir-rtl">
            <div class="col-md-3 col-sm-3 pull-right">
                <ul class="user-prof-list">
                    <li><a href="{{URL::to($lang.'/forgetPassword')}}"><i class="fa fa-tag"></i>{{trans('lang.restore_password')}}</a></li>
                </ul>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-9 col-sm-9">
                <div class="login-part">
                    <div class="login-header">
                        <h3 class="login-hd"><i class="fa fa-lock"></i>{{trans('lang.restore_password')}}</h3>
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
                        {{ Form::open(array('url' => $lang.'/forgetPassword' ,'class' => 'form-horizontal user-profile-form')) }}


                        {{Form::hidden('lang' , $lang)}}
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label pull-right"> {{trans('lang.email')}}</label>
                            <div class="col-sm-9">
                                {{Form::email('email' ,'', ['class'=>'form-control'])}}
                                <div style="color:red;">{{$errors->first('email')}}</div>
                                <br>	
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" value="{{trans('lang.restore_password')}}">
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
</section>
@stop