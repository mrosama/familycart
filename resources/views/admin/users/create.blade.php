@extends('admin.layouts.master')
@section('title')
اضافة  مستخدم
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
                <span class="active">اضافة  مستخدم</span>
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
                            <span class="caption-subject font-red sbold uppercase">اضافة مستخدم جديد</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/users')}}" class="btn btn-primary">عرض جميع المستخدمين</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => 'admin.users.store' , 'class' => 'form-horizontal' , 'files' => true])}}
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
                                <label class="control-label col-md-3">اسم  المستخدم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">نوع  المستخدم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('type' , ['user' => 'مستخدم' , 'admin' => 'مدير' , 'seller' => 'بائع او تاجر'] , '' , ['class' => 'form-control' , 'placeholder' => 'اختر النوع .....'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">البريد الالكتروني
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::email('email' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3"> الصورة الشخصية
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::file('image' ,['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  كلمة المرور
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::password('password' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> تأكيد  كلمة المرور
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::password('password_confirmation' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> الجنس
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::radio('sex' ,'male' , true)}}ذكر
                                    &nbsp;{{Form::radio('sex' ,'female' )}}انثى
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> تاريخ الميلاد
                                </label>
                                <div class="col-md-6">
                                    <input name="birthdate" class="form-control form-control-inline input-medium date-picker"  size="16" type="text" value="">
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">اضافة</button>
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