@extends('admin.layouts.master')
@section('title')
عرض جميع  المنتجات
@stop
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1> المنتجات
                    <small>عرض الكل</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('success'))
                <div class="alert alert-success"><strong>شكرا لك !</strong>{{Session::get('success')}}</div>
                @endif

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> المنتجات</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center"> م  </th>
                                    <th class="text-center">  اسم المنتج </th>
                                    <th class="text-center">  صورة المنتج </th>
                                    <th class="text-center">   السعر الاصلي </th>
                                    <th class="text-center">   السعر بعد الخصم </th>
                                    <th class="text-center">   البائعين</th>
                                    <th class="text-center">   اضافة للعروض </th>
                                    <th class="text-center">   الالوان والاحجام</th>
<!--                                    <th class="text-center">   الالوان</th>
                                    <th class="text-center">   الاحجام</th>-->
                                    <th class="text-center">   الخصائص والمواصفات</th>
                                    <th class="text-center"> عرض وتعديل  </th>
                                    <th class="text-center"> حذف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                @foreach($products as $product)
                                <tr>
                                    <td class="text-center"> {{$x++}} </td>
                                    <td class="text-center"> <a href="{{URL::to('/admin/products' , [$product->id , 'edit'])}}">{{$product->name_ar}}</a> </td>
                                    <td class="text-center"><img src="{{URL::to('/') . '/images/products/' .$product->image}}" width="100px" height="100px;" /> </td>
                                    <td class="text-center"> {{$product->original_price}}</td>
                                    <td class="text-center"> {{$product->discount_price}}</td>
                                    <td class="text-center"> <a href="{{URL::to('/admin/products/sellers' , [$product->id])}}"> <i class="fa fa-users" aria-hidden="true"></i> </a></td>
                                    <td class="text-center"> <a href="{{URL::to('/admin/products/offers' , [$product->id])}}"> <i class="fa fa-tags" aria-hidden="true"></i> </a></td>
                                    <td class="text-center"> <a href="{{URL::to('/admin/products/show_colors_sizes' , [$product->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i> </a></td>
<!--                                    <td class="text-center"> <a href="{{URL::to('/admin/products/show_colors' , [$product->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i> </a></td>
                                    <td class="text-center"> <a href="{{URL::to('/admin/products/show_sizes' , [$product->id])}}"> <i class="fa fa-wrench" aria-hidden="true"></i> </a></td>-->
                                    <td class="text-center"> <a href="{{URL::to('/admin/products/show_advantages' , [$product->id])}}"> <i class="fa fa-plus" aria-hidden="true"></i> </a></td>
                                    <td class="text-center"><a href="{{URL::to('/admin/products' , [$product->id , 'edit'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="text-center">
                                        {{Form::open(['route'=>['admin.products.destroy' , $product->id] , 'method'=>'delete' , 'id'=>'form'])}}
                                        <a href="javascript:;" onclick="if (confirm(' هل انت متاكد من عملية الحذف ؟'))
                                                    $(this).closest('form').submit();"> <i class="fa fa-trash" aria-hidden="true" style="color:rgb(240, 80, 80)"></i></a>
                                        {{Form::close()}}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
        @stop