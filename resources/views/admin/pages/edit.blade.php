@extends('admin.layouts.master')
@section('title')
تعديل بيانات الصفحة
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
                <span class="active">تعديل بيانات الصفحة</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل بيانات الصفحة</span>
                        </div>
                        <div class="actions">
                                <a href="{{URL::to('/admin/pages')}}" class="btn btn-primary">عرض جميع الصفحات</a>
                        </div>
                    </div>
                    <div class="portlet-body">


                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.pages.update' , $page->id] , 'class' => 'form-horizontal' , 'method' => 'patch'])}}
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
                                <label class="control-label col-md-3">عنوان الصفحة 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('title' ,$page->title , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Page Title
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::text('title_en' ,$page->title_en , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">تفاصيل الصفحة 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::textarea('desc' ,$page->desc , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Page Description
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-7">
                                    {{Form::textarea('desc_en' ,$page->desc_en , ['class' => 'form-control'])}}
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