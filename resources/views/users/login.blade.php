@extends('site.layouts.master')
@section('content')
<section id="main-register">
    <div class="container">
        <div class="row dir-rtl">
            <div class="col-md-2 col-sm-3 pull-right">
                <ul class="user-prof-list">
                    <li><a href="{{URL::to($lang.'/login')}}"><i class="fa fa-tag"></i> {{trans('lang.login')}}</a></li>
                    <li><a href="{{URL::to($lang.'/register')}}"><i class="fa fa-tag"></i> {{trans('lang.new_account')}}</a></li>
                </ul>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-10 col-sm-9">
                <div class="login-part">
                    <div class="login-header">
                        <h3 class="login-hd"><i class="fa fa-lock"></i> {{trans('lang.registered_cutomers')}}</h3>
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

                    {{ Form::open(array('url' => 'login' ,'class' => 'form-horizontal user-profile-form')) }}

                    
                    
                    <input type="hidden" name="lang" value="{{App::getLocale()}}" />
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label pull-right">{{trans('lang.email')}}</label>
                        <div class="col-sm-9">
                            {{Form::email('email' ,'', ['class'=>'form-control'])}}
                            <div style="color:red;">{{$errors->first('email')}}</div>
                            <br>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="old_password" class="col-sm-3 control-label pull-right">{{trans('lang.password')}}</label>
                        <div class="col-sm-9">
                            {{Form::password('password' , ['class'=>'form-control'])}}
                            <div style="color:red;">{{$errors->first('email')}}</div>
                            <br>	
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-3">
                            <input class="btn btn-primary btn-block" type="submit" value="{{trans('lang.login')}}">
                            <div class="form-group" style="padding-top:10px;">
                                <div class="col-sm-12 text-center">
                                    {{trans('lang.forgot_password')}}
                                    <a href="{{URL::to($lang.'/forgetPassword')}}" style="color:orange;text-decoration: none;"> {{trans('lang.click_here')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>


            </div>

        </div>
    </div>

</section>
@stop