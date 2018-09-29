@extends('admin.layouts.master')
@section('title')
اعدادات الموقع
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
                <span class="active"> اعدادات الموقع</span>
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
                            <span class="caption-subject font-red sbold uppercase"> اعدادات الموقع</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' =>['admin.settings.update' , 1] , 'class' => 'form-horizontal' , 'method' => 'PUT' , 'files' =>'TRUE'])}}
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
                                <label class="control-label col-md-3"> اسم الموقع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::text('site_name' ,$setting->site_name , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> لوجو الموقع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::file('logo' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> لوجو الموقع الحالي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <img src="{{url::to('/').'/images/settings/'.$setting->logo}}" width="100px;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الهاتف

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('phone' ,$setting->phone , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الجوال

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('mobile' ,$setting->mobile , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> فاكس

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('fax' ,$setting->fax , ['class' => 'form-control'])}}
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3"> البريد الالكتروني
                                </label>
                                <div class="col-md-9">
                                    {{Form::email('email' ,$setting->email , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> العنوان
                                </label>
                                <div class="col-md-9">
                                    {{Form::text('address' ,$setting->address , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> العنوان بالانجليزي
                                </label>
                                <div class="col-md-9">
                                    {{Form::text('address_en' ,$setting->address_en , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3"> facebook

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('facebook' ,$setting->facebook , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> twitter

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('twitter' ,$setting->twitter , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> linkedin

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('linkedin' ,$setting->linkedin , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3"> google plus

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('g_plus' ,$setting->g_plus , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> instegram

                                </label>
                                <div class="col-md-9">
                                    {{Form::text('instegram' ,$setting->instegram , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> الموقع على الخريطة

                                </label>
                                <div class="col-md-4">
                                    {{Form::text('lat' ,$setting->lat , ['class' => 'form-control' , 'placeholder' => 'خط العرض'])}}
                                </div>
                                <div class="col-md-4">
                                    {{Form::text('long' ,$setting->long , ['class' => 'form-control'  , 'placeholder' => 'خط الطول'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3"> نبذة عن الموقع

                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('desc' ,$setting->desc , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> about site

                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('desc_en' ,$setting->desc_en , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> اتفاقية الموقع

                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('agreement' ,$setting->agreement , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Site Agreement
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('agreement_en' ,$setting->agreement_en , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> الشحن والاسترجاع
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('shipping_return' ,$setting->shipping_return , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Shipping & Returns
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('shipping_return_en' ,$setting->shipping_return_en , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">الخصوصية والسرية
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('privacy' ,$setting->privacy , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Privacy
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('privacy_en' ,$setting->privacy_en , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تعديل البيانات</button>
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