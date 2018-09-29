@extends('admin.layouts.master')
@section('title')
صور أخر العروض
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
                <span class="active">   صور أخر العروض</span>
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
                            <span class="caption-subject font-red sbold uppercase">  صور أخر العروض</span>
                        </div>
                    </div>
                    <div class="portlet-body">


                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.best_offers.update' , 1] , 'class' => 'form-horizontal' , 'files' =>'true' , 'method' =>'patch'])}}
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
                                <label class="control-label col-md-3"> الصورة الاساسية
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('main_img' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('main_link', $best_offer->main_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/best_offers').'/'.$best_offer->main_img}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصور الجانبية 
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الاولى  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('first_img' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('first_link', $best_offer->first_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/best_offers').'/'.$best_offer->first_img}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الثانية  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('second_img' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('second_link', $best_offer->second_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/best_offers').'/'.$best_offer->second_img}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الثالثة  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('third_img'  , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('third_link', $best_offer->third_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/best_offers').'/'.$best_offer->third_img}}" width="150px;" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الرابعة  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('fourth_img' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('fourth_link', $best_offer->fourth_link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                </label>
                                <div class="col-md-4">
                                    <img src="{{URL::to('/images/best_offers').'/'.$best_offer->fourth_img}}" width="150px;" />
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