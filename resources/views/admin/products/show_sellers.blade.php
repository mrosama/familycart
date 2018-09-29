@extends('admin.layouts.master')
@section('title')
بائعين المنتج
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
                <span class="active"> بائعين المنتج</span>
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
                            <span class="caption-subject font-red sbold uppercase">اضافة  بائع جديد</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' =>['admin/products/add_seller' , $product_id] , 'class' => 'form-horizontal' , 'files' => 'true'])}}
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
                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  المنتج
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{$product_name}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> اختر البائع
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('seller_id' ,$sellers, '' , ['class' => 'form-control' , 'placeholder' => 'اختر البائع ...' ])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الكمية 
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('quantity' , '' , ['class' => 'form-control' , 'placeholder' => 'الكمية'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> السعر 
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('price' , '' , ['class' => 'form-control' , 'placeholder' => 'السعر'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">   الضمان
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('guarantee' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">   guarantee 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('guarantee_en' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">   الشحن والتسليم 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('delivery' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">    Delivery 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('delivery_en' ,'' , ['class' => 'form-control'])}}
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
                                    <span class="caption-subject bold uppercase"> البائعين الموجودة حاليا</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">

                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"> م  </th>
                                            <th class="text-center">  اسم البائع </th>
                                            <th class="text-center">  الكمية</th>
                                            <th class="text-center">  السعر</th>
                                            <th class="text-center">   الضمان </th>
                                            <th class="text-center">    الشحن والتسليم </th>
                                            <th class="text-center"> تعديل</th>
                                            <th class="text-center"> حذف </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @if(count($product_sellers) > 0)
                                        @foreach($product_sellers as $row)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$row->getSeller->trade_name}}</td>
                                            <td>{{$row->quantity}}</td>
                                            <td>{{$row->price}}</td>
                                            <td>{{$row->guarantee}}</td>
                                            <td>{{$row->delivery}}</td>
                                            <td class="text-center"><a href="{{URL::to('/admin/products/edit_seller/'.$row->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </td>
                                            <td class="text-center">
                                                <a href="{{URL::to('/admin/products/delete_seller/'.$row->id)}}" onclick="if (confirm('هل انت متأكد من عملية الحذف ؟')) {
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