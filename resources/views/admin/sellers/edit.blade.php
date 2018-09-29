@extends('admin.layouts.master')
@section('title')
تعديل بيانات  بائع
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
                <span class="active">تعديل بيانات  بائع</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل بيانات بائع</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/sellers')}}" class="btn btn-primary">عرض جميع البائعين</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.sellers.update' , $seller->id] , 'method' => 'patch' ,  'class' => 'form-horizontal'])}}
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
                                <label class="control-label col-md-3"> الاسم التجاري
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('trade_name' , $seller->trade_name , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  Trade Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('trade_name_en' , $seller->trade_name_en , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  نوع التجارة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('trade_type' , $seller->trade_type , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  رقم التلفون 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('phone' , $seller->phone , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  البريد الالكتروني  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::email('email' , $seller->email , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">   العنوان  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('address' , $seller->address , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تعديل بيانات</button>
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