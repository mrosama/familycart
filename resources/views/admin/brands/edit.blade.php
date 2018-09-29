@extends('admin.layouts.master')
@section('title')
تعديل بيانات  الماركة
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
                <span class="active">  تعديل بيانات  الماركة</span>
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
                            <span class="caption-subject font-red sbold uppercase">   تعديل بيانات  الماركة</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/brands')}}" class="btn btn-primary">عرض جميع الماركات</a>
                        </div>
                    </div>
                    <div class="portlet-body">


                        <!-- BEGIN FORM-->
                        {{Form::open(['route' =>['admin.brands.update' , $brand->id] , 'class' => 'form-horizontal' , 'method' => 'patch'])}}
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
                                <label class="control-label col-md-3">اسم القسم الرئيسي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::select('section_id' ,$sections , $brand->section_id , ['class' => 'form-control' , 'id' => 'section_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم القسم الفرعي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::select('branch_id' ,$branches , $brand->branch_id , ['class' => 'form-control' , 'id' => 'branch_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم نوع الفرع 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::select('type_id' , count($types) > 0 ? $types : ['0' => 'لايوجد انواع لهذا القسم'] , $brand->type_id  , ['class' => 'form-control' , 'id' => 'type_id' ])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  الماركة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('name_ar' ,$brand->name_ar , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Brand Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::text('name_en' ,$brand->name_en , ['class' => 'form-control'])}}
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