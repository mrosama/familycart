@extends('admin.layouts.master')
@section('title')
تعديل  بنر
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
                <span class="active">تعديل  بنر</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل بنر</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/sliders')}}" class="btn btn-primary">عرض جميع البنرات</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.sliders.update' , $slider->id] , 'class' => 'form-horizontal' , 'method' =>'PUT' , 'files' =>'TRUE'])}}
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
                                <label class="control-label col-md-3"> مكان الظهور
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    @if($slider->place == 'home')
                                    {{Form::radio('place' , 'home' , 'true')}} الصفحة الرئيسية
                                    {{Form::radio('place' , 'offers')}} صفحة العروض
                                    @else($slider->place == 'offers')
                                    {{Form::radio('place' , 'home' )}} الصفحة الرئيسية
                                    {{Form::radio('place' , 'offers' , 'true')}} صفحة العروض
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الرابط
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('link' ,$slider->link , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> تغيير الصورة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::file('image' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الحالية
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <img src="{{URL::to('/').'/images/sliders/'.$slider->image}}" width="100px;" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تعديل</button>
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