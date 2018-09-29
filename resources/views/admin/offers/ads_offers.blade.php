@extends('admin.layouts.master')
@section('title')
اعلانات العروض
@stop
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height:1535px">

        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{URL::to('/admin/home')}}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">   اعلانات العروض</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">  اعلانات العروض</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.ads_offers.update' , 1] , 'class' => 'form-horizontal' , 'files' =>'true' , 'method' =>'patch'])}}
                        <div class="form-body">
                            <!-- Flash Message -->
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            <!-- End Flash Message -->
                            <div class="form-group">
                                <label class="control-label col-md-3"> الاعلان الاول
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('first_ads' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('first_link', $ads_offer->first_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/ads_offers').'/'.$ads_offer->first_ads}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الثانية  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('second_ads' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('second_link', $ads_offer->second_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/ads_offers').'/'.$ads_offer->second_ads}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الثالثة  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('third_ads'  , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('third_link', $ads_offer->third_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/ads_offers').'/'.$ads_offer->third_ads}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الرابعة  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('fourth_ads' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('fourth_link', $ads_offer->fourth_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/ads_offers').'/'.$ads_offer->fourth_ads}}" width="150px;" />
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تحديث</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    @stop