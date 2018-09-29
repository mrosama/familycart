@extends('site.layouts.master')
@section('content')
<section id="main-search" class="dir-rtl">
    <div class="container">
        <div class="well">
            <div id="mapholder">
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4396.403042548122!2d39.89971594073469!3d21.411442754845655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf55ad5f68eb472a4!2z2YjYp9iv24wg2YXYrdiz2LE!5e1!3m2!1sar!2seg!4v1466943878915" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                <iframe src = "https://maps.google.com/maps?q={{$setting->lat}}{{','}}{{$setting->long}}&hl=es;z=14&amp;output=embed&hl=ar-AR"  width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 pull-right">
                <a id="sidebar-toggle" class="badge visible-xs pull-left"><i class="fa fa-plus fa-lg"></i></a>
                <div>
                    <div class="user-prof-links">
                        <h4 class="user-prof-name">  {{trans('lang.contact')}}  : </h4>
                        <ul class="user-prof-list">
                            <li class="row">
                                <div class="col-xs-10 pull-left">
                                    {{trans('lang.phone')}}
                                    <p>{{$setting->phone}}</p><br>
                                </div>
                                <div class="col-xs-2"><i class="fa fa-phone fa-lg"></i></div>
                            </li>
                            <li class="row">
                                <div class="col-xs-10 pull-left">
                                    {{trans('lang.email')}}
                                    <a href="mailto:{{$setting->email}}" ><p class="editt">{{$setting->email}}</p></a><br>
                                </div>
                                <div class="col-xs-2"><i class="fa fa-envelope-o fa-lg"></i></div>
                            </li>
                            <li class="row">
                                <div class="col-xs-10 pull-left">
                                    <a href="{{$setting->twitter}} ">{{trans('lang.twitter')}}</a><br>
                                </div>
                                <div class="col-xs-2"><i class="fa fa-twitter-square fa-lg"></i></div>
                            </li> 
                            <li class="row">
                                <div class="col-xs-10 pull-left">
                                    <a href="{{$setting->facebook}} ">{{trans('lang.facebook')}}</a><br>
                                </div>
                                <div class="col-xs-2"><i class="fa fa-facebook-square fa-lg"></i> </div>
                            </li> 
                            <li class="row">
                                <div class="col-xs-10 pull-left">
                                    <p class="editt"> {{trans('lang.address')}} </p>
                                    <p class="editt">
                                        @if($lang == 'en')
                                        {{$setting->address_en}}
                                        @else
                                        {{$setting->address}}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-xs-2"><i class="fa fa-map-marker fa-lg"></i> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-9 col-sm-8">
                <div class="login-part">
                    <div class="login-header">
                        <h3 class="login-hd"><i class="fa fa-envelope"></i> {{trans('lang.sendMsg')}} :</h3>
                    </div>
                    <div class="user-prof-con">
                        {{Form::open(array('url' => ''.$lang.'/contactUs/sendMsg' , 'method' => 'post' , 'class' => 'form-horizontal user-profile-form'))}}
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label pull-right">{{trans('lang.name')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="name" type="text" value="" required="" placeholder="{{trans('lang.name')}}">
                                <font color="red">{{$errors->first('name')}}</font>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label pull-right"> {{trans('lang.email')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="email" type="email" value=""  required="" placeholder="{{trans('lang.email')}}">
                                <font color="red">{{$errors->first('email')}}</font>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-3 control-label pull-right">{{trans('lang.subject')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="title" type="text" required="" value="" placeholder="{{trans('lang.subject')}}">
                                <font color="red">{{$errors->first('title')}}</font>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city_id" class="col-sm-3 control-label pull-right">{{trans('lang.msg')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="msg"  required="" placeholder="{{trans('lang.msg')}}" rows="10"></textarea>
                                <font color="red">{{$errors->first('msg')}}</font>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 pull-left text-center">
                                <input class="btn btn-warning" type="submit" value="{{trans('lang.send')}}">
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