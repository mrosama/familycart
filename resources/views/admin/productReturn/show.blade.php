@extends('admin.layouts.master')
@section('title')
عرض تفاصيل طلب المرتجع
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
                <span class="active">  عرض تفاصيل طلب المرتجع</span>
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
                            <span class="caption-subject font-red sbold uppercase">  عرض تفاصيل طلب المرتجع</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">  رقم الطلب
                                </label>
                                <div class="col-md-6">
                                    {{$productReturn->order_id}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  المنتج
                                </label>
                                <div class="col-md-6">
                                    {{\App\Product::find($productReturn->product_id)->name_ar}}
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  العضو
                                </label>
                                <div class="col-md-6">
                                    {{\App\User::find($productReturn->user_id)->name}}
                                </div>
                            </div>
                        </div>
                        
                          <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">  سبب الاتجاع
                                </label>
                                <div class="col-md-9">
                                    {{$productReturn->causeFlashBacks}}
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="{{URL::to('admin/productReturn')}}" class="btn green"> رجوع  </a>
                                </div>
                            </div>
                        </div>
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