@extends('admin.layouts.master')
@section('title')
اضافة  منتج
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
                <span class="active">اضافة  منتج</span>
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
                            <span class="caption-subject font-red sbold uppercase">اضافة المنتجات جديدة</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/products')}}" class="btn btn-primary">عرض جميع المنتجات</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => 'admin.products.store' , 'class' => 'form-horizontal' , 'files' => 'TRUE'])}}
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
                                <div class="col-md-6">
                                    {{Form::select('section_id' ,$sections , '' , ['class' => 'form-control'  , 'placeholder' => 'اختر القسم الرئيسي' , 'id' => 'section_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم القسم الفرعي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('branch_id' ,['' => 'اختر القسم الرئيسي اولا'] , '' , ['class' => 'form-control' , 'id' => 'branch_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  نوع الفرع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('type_id' ,['' => 'اختر القسم الفرعي اولا'] , '' , ['class' => 'form-control' , 'id' => 'type_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  الماركة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('brand_id' ,['' => 'اختر  الفرعي  او النوع اولا'] , '' , ['class' => 'form-control' , 'id' => 'brand_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  البائع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('seller_id' , $sellers , '' , ['class' => 'form-control' , 'placeholder' => 'اختر اسم البائع'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  المنتج
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_ar' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Product Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_en' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">السعر الاصلي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('original_price' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">السعر بعد الخصم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('discount_price' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الكمية 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('quantity' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  مدة الشحن
                                    <span class="required" aria-required="true"> * (باليوم)</span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('duration_charging' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  مدة التسليم
                                    <span class="required" aria-required="true"> * (باليوم)</span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('duration_delivery' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الضمان
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('guarantee' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  الدفع عند الاستلام
                                </label>
                                <div class="col-md-6">
                                    نعم {{Form::radio('payment_on_delivery' ,'1' , ['checked'])}}
                                    لا{{Form::radio('payment_on_delivery' ,'0')}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> تغليف الهدايا
                                </label>
                                <div class="col-md-6">
                                    نعم {{Form::radio('gift_wrapping' ,'1' , ['checked'])}}
                                    لا{{Form::radio('gift_wrapping' ,'0' )}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  شحن مجاني
                                </label>
                                <div class="col-md-6">
                                    نعم {{Form::radio('free_charge' ,'1' , ['checked'])}}
                                    لا{{Form::radio('free_charge' ,'0')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> اللون الاساسي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('color_id' ,$colors, '' , ['class' => 'form-control' , 'placeholder' => 'اختر اللون' , 'id' => 'color_id'])}}
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <button class="btn btn-primary" type="button" id="more_colors">اضف المزيد من الالوان</button>
                                                                </div>-->
                            </div>

                            <!--                            <div id="more_colors_place"></div>-->

                            <div class="form-group">
                                <label class="control-label col-md-3"> الحجم الاساسي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('size_id' ,$sizes , '' , ['class' => 'form-control' , 'placeholder' => 'اختر الحجم' , 'id' => 'size_id'])}}
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <button class="btn btn-primary" type="button" id="more_sizes">اضف المزيد من الاحجام</button>
                                                                </div>-->
                            </div>
                            <!--                            <div id="more_sizes_place"></div>-->

                            <div class="form-group">
                                <label class="control-label col-md-3"> تفاصيل المنتج 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('details_ar' ,'' , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Product Details 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('details_en' ,'' , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> صورة المنتج الاساسية
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('image')}}
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" id="addMoreImages" class="btn btn-success">اضغط هنا لرفع المزيد من الصور</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">

                                </label>
                                <div class="col-md-4">
                                    <div id="more_images"></div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3">   رفع فيديو للمنتج
                                    <span class="required" aria-required="true"> اختياري </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('video')}}
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