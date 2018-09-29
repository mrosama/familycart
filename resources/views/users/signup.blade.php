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
                        <h3 class="login-hd"><i class="fa fa-lock"></i> {{trans('lang.new_account')}}</h3>
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

                    {{ Form::open(array('url' => $lang.'/register' ,'class' => 'form-horizontal user-profile-form')) }}

                    <div class="form-group">
                        <label for="theName" class="col-sm-3 control-label pull-right">{{trans('lang.name')}}</label>
                        <div class="col-sm-9">
                            {{ Form::text('theName' , '' , array('class' => 'form-control' , 'placeholder' => trans('lang.name')))}}
                            <div style="color:red;">{{$errors->first('theName')}}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="col-sm-3 control-label pull-right">{{trans('lang.sex')}} </label>
                        <input type="radio" name="sex" value="male" checked> {{trans('lang.male')}}
                        <input type="radio" name="sex" value="female"> {{trans('lang.female')}}
                    </div>

                    <div class="form-group">
                        <label for="theEmail" class="col-sm-3 control-label pull-right"> {{trans('lang.email')}}</label>
                        <div class="col-sm-9">
                            {{ Form::text('theEmail' , '' , array('class' => 'form-control' , 'placeholder' => trans('lang.email')))}}
                            <div style="color:red;">{{$errors->first('theEmail')}}</div>
                        </div>
                    </div>	

                    <hr>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label pull-right"> {{trans('lang.password')}} </label>
                        <div class="col-sm-9">
                            {{Form::password('password' , ['class'=>'form-control' , 'placeholder'=>trans('lang.password')])}}
                            <div style="color:red;">{{$errors->first('password')}}</div>
                        </div>
                    </div>	

                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-3 control-label pull-right">  {{trans('lang.confirm_password')}}</label>
                        <div class="col-sm-9">
                            {{Form::password('password_confirmation' , ['class'=>'form-control' , 'placeholder'=> trans('lang.confirm_password')])}}
                            <div style="color:red;">{{$errors->first('password_confirmation')}}</div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="birthdate" class="col-sm-3 control-label pull-right">  {{trans('lang.birthdate')}}</label>
                        <div class="col-sm-9">
                            {{Form::text('birthdate' , '' , ['class'=>'form-control' , 'id' => 'datepicker' , 'placeholder'=>''])}}
                            <div style="color:red;">{{$errors->first('birthdate')}}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" value="1" name="news">
                        {{trans('lang.Subscribe_Newsletter')}}
                    </div>

                    <div class="form-group">
                        
                        <input type="checkbox" value="1" name="privacy">
                        {{trans('lang.privacy_policy_agree')}}  - <a href="{{URL::to('/').'/'.$lang.'/privacy'}}"> {{trans('lang.preview')}} 
                        </a>
                        <span style="color:red;">{{$errors->first('privacy')}}</span>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-3">
                            <input class="btn btn-primary btn-block" type="submit" value="{{trans('lang.new_account')}}">
                            <div class="form-group" style="padding-top:10px;">
                                <div class="col-sm-12 text-center">
                                    <p> {{trans('lang.haveAccount')}}   <a href="{{URL::to($lang.'/login')}}"> {{trans('lang.login')}}</a>  </p>
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