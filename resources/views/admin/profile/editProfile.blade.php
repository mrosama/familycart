@extends('admin.layouts.master')
@section('title')
تعديل بياناتي 
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
                <span class="active">تعديل بياناتي</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل بياناتي</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <!-- BEGIN FORM-->
                        {{Form::open(['url' => 'admin/profile/update' , 'class' => 'form-horizontal' , 'method' => 'post'])}}
                        <div class="form-body">
                            <!-- Flash Message -->
{{count($errors)}}
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <!-- End Flash Message -->
                            <div class="form-group">
                                <label class="control-label col-md-3">الاسم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('name' , $admin->name , ['class' => 'form-control'])}}
                                    <font color="red">{{$errors->first('name')}}</font>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">البريد الالكتروني
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::email('email' , $admin->email , ['class' => 'form-control'])}}
                                    <font color="red">{{$errors->first('email')}}</font>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">الجوال
                                </label>
                                <div class="col-md-4">
                                    {{Form::number('mobile' , $admin->mobile , ['class' => 'form-control'])}}
                                    <font color="red">{{$errors->first('mobile')}}</font>
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

                            <h3>تغيير كلمة المرور</h3>
                            <!-- BEGIN FORM-->
                            {{Form::open(['url' => 'admin/password/update' , 'class' => 'form-horizontal' , 'method' => 'post'])}}
                            <div class="form-body">
                                <!-- Flash Message -->
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                                @endif
                                <!-- End Flash Message -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">كلمة المرور القديمة
                                        <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        {{Form::password('old_password' , ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">كلمة المرور الجديدة
                                        <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        {{Form::password('password' , ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">تأكيد كلمة المرور
                                        <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        {{Form::password('password_confirmation'  , ['class' => 'form-control'])}}
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