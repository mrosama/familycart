@extends('admin.layouts.master')
@section('title')
تغيير حالة الطلب
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
                <span class="active"> تغيير حالة الطلب</span>
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
                            <span class="caption-subject font-red sbold uppercase"> تغيير حالة الطلب</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' =>['admin/orders/edit_status' , $order->id] , 'class' => 'form-horizontal'])}}
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
                                <label class="control-label col-md-3">  حالة الطلب الحالية
                                </label>
                                <div class="col-md-6">
                                    @if($order->status == 'request_receipt')
                                    <button class="btn btn-primary" type="button">استلام الطلب </button>
                                    @elseif($order->status == 'follow_request')
                                    <button class="btn btn-warning" type="button">متابعة الطلب</button>
                                    @elseif($order->status == 'deleviry_request')  
                                    <button class="btn btn-default" type="button">توصيل الطلب </button>
                                    @elseif($order->status == 'end_request')
                                    <button class="btn btn-success" type="button">انتهاء الطلب </button>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> تغيير حالة الطلب الى
                                </label>
                                <div class="col-md-6">
                                    @if($order->status == 'request_receipt')
                                    <select name="status" class="form-control">
                                        <option value=""selected="" disabled=""> اختر الحالة من فضلك</option>
                                        <option value="follow_request">متابعة الطلب</option>
                                        <option value="deleviry_request">توصيل الطلب</option>
                                        <option value="end_request">انتهاء الطلب</option>
                                    </select>
                                    @elseif($order->status == 'follow_request')
                                    <select name="status" class="form-control">
                                        <option value=""selected="" disabled=""> اختر الحالة من فضلك</option>
                                        <option value="request_receipt">استلام الطلب</option>
                                        <option value="deleviry_request">توصيل الطلب</option>
                                        <option value="end_request">انتهاء الطلب</option>
                                    </select>
                                    @elseif($order->status == 'deleviry_request')  
                                    <select name="status" class="form-control">
                                        <option value=""selected="" disabled=""> اختر الحالة من فضلك</option>
                                        <option value="request_receipt">استلام الطلب</option>
                                        <option value="follow_request">متابعة الطلب</option>
                                        <option value="end_request">انتهاء الطلب</option>
                                    </select>
                                    @elseif($order->status == 'end_request')
                                    <select name="status" class="form-control">
                                        <option value=""selected="" disabled=""> اختر الحالة من فضلك</option>
                                        <option value="request_receipt">استلام الطلب</option>
                                        <option value="follow_request">متابعة الطلب</option>
                                        <option value="deleviry_request">تسليم الطلب</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تحديث</button>
                                        <a href="{{URL::to('/admin/orders')}}" class="btn btn-danger">رجوع</a>
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