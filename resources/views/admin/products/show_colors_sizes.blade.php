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
                            <span class="caption-subject font-red sbold uppercase">اضافة  لون وحجم جديد</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' =>['admin/products/add_colors_sizes' , $product_id] , 'class' => 'form-horizontal' , 'files' => 'true'])}}
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
                            <!-- End Flash Message -->

<!--                            <div class="form-group">
                                <label class="control-label col-md-3">    
                                     اختر النوع
                                </label>
                                <div class="col-md-6">
                                   لون   {{Form::checkbox('type' , 'color' ,0 ,['id' => 'color'])}}
                                    حجم {{Form::checkbox('type' , 'size' ,0 , ['id' => 'size'])}}
                                </div>
                            </div>-->
                            <div class="alert alert-warning">
                                لاضافة لون فقط اختر اللون ولاضافة حجم فقط اختر الحجم فقط او اختر كليهما لاضافة لون وحجم
                            </div>
                            <div class="form-group" id = 'color_id' >
                                <label class="control-label col-md-3">  اللون  
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('color_id' ,$colors, '' , ['class' => 'form-control' , 'placeholder' => 'اختر اللون ...' ])}}
                                </div>
                            </div>
                            <div class="form-group" id = 'size_id' >
                                <label class="control-label col-md-3">  الحجم  
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('size_id' ,$sizes, '' , ['class' => 'form-control' ,   'placeholder' => 'اختر الحجم ...' ])}}
                                </div>
                            </div>
                            
                            <div class="form-group" id = 'quantity'>
                                <label class="control-label col-md-3">   الكمية 
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('quantity' , '' , ['class' => 'form-control'  , 'placeholder' => 'الكمية'])}}
                                </div>
                            </div>
                            <div class="form-group"   id = 'name_ar'>
                                <label class="control-label col-md-3">اسم  المنتج
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_ar' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group" id = 'name_en'>
                                <label class="control-label col-md-3">Product Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_en' ,'' , ['class' => 'form-control' ])}}
                                </div>
                            </div>
                            <div class="form-group" id="original_price">
                                <label class="control-label col-md-3">  السعر الاصلي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('original_price' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group" id = 'discount_price'>
                                <label class="control-label col-md-3">  السعر بعد الخصم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('discount_price' ,'' , ['class' => 'form-control' ])}}
                                </div>
                            </div>

                            <div class="form-group" id="image">
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

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> الالوان والاحجام الموجودة حاليا</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">

                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"> م  </th>
                                            <th class="text-center">  اسم المنتج </th>
                                            <th class="text-center">  اللون</th>
                                            <th class="text-center">  الحجم</th>
                                            <th class="text-center">  الكمية</th>
                                            <th class="text-center">  صورة المنتج </th>
                                            <th class="text-center">   السعر الاصلي </th>
                                            <th class="text-center">   السعر بعد الخصم </th>
                                            <th class="text-center"> تعديل</th>
                                            <th class="text-center"> حذف </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @if(count($product_colors_sizes) > 0)
                                        @foreach($product_colors_sizes as $row)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$row->name_ar}}</td>
                                            <td>
                                                @if($row->color_id != 0)
                                                {{$row->getColor->name_ar}}
                                                @else
                                                لا يوجد
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->size_id !=0)
                                                {{$row->getSize->name}}
                                                @else
                                                لايوجد
                                                @endif
                                            </td>
                                            <td>{{$row->quantity}}</td>
                                            <td><img src="{{URL::to('/images').'/products/'.$row->image}}" width="100px;" /></td>
                                            <td>{{$row->original_price}}</td>
                                            <td>{{$row->discount_price}}</td>

                                            <td class="text-center"><a href="{{URL::to('/admin/products/edit_color_size/'.$row->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </td>

                                            <td class="text-center">
                                                <a href="{{URL::to('/admin/products/delete_color_size/'.$row->id)}}" onclick="if (confirm('هل انت متأكد من عملية الحذف ؟')) {
                                                            return true;
                                                        } else {
                                                            return false;
                                                        }"  style="text-align: center;" >   <i class="fa fa-trash" aria-hidden="true" style="color:rgb(240 , 80, 80)"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->

                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    @stop