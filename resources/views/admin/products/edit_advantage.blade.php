@extends('admin.layouts.master')
@section('title')
مميزات  المنتج
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
                <span class="active"> مميزات المنتج</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل مميزات للمنتج</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/products/show_advantages/').'/'.$advantage->product_id}}" class="btn btn-primary">رجوع</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' =>['admin/products/update_advantage' , $advantage->id] , 'class' => 'form-horizontal' , 'files' => 'true'])}}
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
                                <label class="control-label col-md-3"> اسم الخاصية
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('feature_id' ,$features, $advantage->feature_id , ['class' => 'form-control' , 'placeholder' => 'اختر الخاصية ...' ])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">   اسم الميزة 
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_ar' , $advantage->name_ar , ['class' => 'form-control' ])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  Advantage Name 
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_en' , $advantage->name_en , ['class' => 'form-control' ])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  قيمة الميزة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('value_ar' ,$advantage->value_ar , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  Advantage Value
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('value_en' , $advantage->value_en , ['class' => 'form-control'])}}
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