@extends('admin.layouts.master')
@section('title')
الوان واحجام  المنتج
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
                <span class="active">  الوان واحجام  المنتج</span>
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
                            <span class="caption-subject font-red sbold uppercase">تعديل بيانات  لون وحجم</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' =>['admin/products/update_color_size' , $color_size_data->id] , 'class' => 'form-horizontal' ,'method' =>'post' , 'files' => 'true'])}}
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
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <div class="alert alert-warning">
                                لاضافة لون فقط اختر اللون ولاضافة حجم فقط اختر الحجم فقط او اختر كليهما لاضافة لون وحجم
                            </div>
                            <div class="form-group" id = 'color_id' >
                                <label class="control-label col-md-3">  اللون  
                                </label>
                                <div class="col-md-6">
                                    @if($color_size_data->color_id != 0)
                                    {{Form::select('color_id' ,$colors, $color_size_data->color_id , ['class' => 'form-control' , 'placeholder' => 'اختر اللون ...' ])}}
                                    @else
                                    {{Form::select('color_id' ,$colors, '' , ['class' => 'form-control' , 'placeholder' => 'اختر اللون ...' ])}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group" id = 'size_id' >
                                <label class="control-label col-md-3">  الحجم  
                                </label>
                                <div class="col-md-6">
                                    @if($color_size_data->size_id != 0)
                                    {{Form::select('size_id' ,$sizes, $color_size_data->size_id , ['class' => 'form-control' , 'placeholder' => 'اختر الحجم ...' ])}}
                                    @else
                                    {{Form::select('size_id' ,$sizes, '' , ['class' => 'form-control' , 'placeholder' => 'اختر الحجم ...' ])}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" id = 'quantity'>
                                <label class="control-label col-md-3">   الكمية 
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('quantity' , $color_size_data->quantity , ['class' => 'form-control'  , 'placeholder' => 'الكمية'])}}
                                </div>
                            </div>
                            <div class="form-group"   id = 'name_ar'>
                                <label class="control-label col-md-3">اسم  المنتج
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_ar' , $color_size_data->name_ar , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group" id = 'name_en'>
                                <label class="control-label col-md-3">Product Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_en' ,$color_size_data->name_en , ['class' => 'form-control' ])}}
                                </div>
                            </div>
                            <div class="form-group" id="original_price">
                                <label class="control-label col-md-3">  السعر الاصلي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('original_price' ,$color_size_data->original_price , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group" id = 'discount_price'>
                                <label class="control-label col-md-3">  السعر بعد الخصم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('discount_price' , $color_size_data->discount_price , ['class' => 'form-control' ])}}
                                </div>
                            </div>

                            <div class="form-group" id = 'discount_price'>
                                <label class="control-label col-md-3">  صورة المنتج الحالية 
                                </label>
                                <div class="col-md-6">
                                    <img src="{{URL::to('/'). '/images/products/' .$color_size_data->image}}" width="100px;">
                                </div>
                            </div>
                            @if(count($product_color_images) > 0)
                            <div class="form-group" id = 'discount_price'>
                                <label class="control-label col-md-3">   صور المنتج الاضافية  
                                </label>
                            </div>
                            <div class="form-group" id = 'discount_price'>
                                <div class="col-md-3">
                                </div>
                                @foreach($product_color_images as $row)
                                <div class="col-md-4">
                                    <img src="{{URL::to('/'). '/images/products/' .$row->image}}" width="100px;"><br>
                                    <a href="{{URL::to('/').'/admin/products/delete_color_image/'.$row->id}}" class="btn btn-danger">حذف الصورة</a>
                                </div>
                                @endforeach
                            </div>
                            @endif
<br>
                            <div class="form-group" id="image">
                                <label class="control-label col-md-3"> تغيير صورة المنتج الاساسية
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