@extends('admin.layouts.master')
@section('title')
عرض جميع الماركات 
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
                <h1> الماركات
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
                <div class="alert alert-success"><strong> !  شكرا لك </strong>{{Session::get('success')}}</div>
                @endif
                
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> الماركات</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center"> م  </th>
                                    <th class="text-center">  اسم القسم الرئيسي</th>
                                    <th class="text-center">  اسم القسم الفرعي</th>
                                    <th class="text-center">  نوع الفرع</th>
                                    <th class="text-center">  الماركة</th>
                                    <th class="text-center"> تعديل </th>
                                    <th class="text-center"> حذف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1 ;?>
                                @foreach($brands as $brand)
                                <tr>
                                    <td class="text-center"> {{$x++}} </td>
                                    <td class="text-center"> {{$brand->getSection->name_ar}} </td>
                                    <td class="text-center"> {{$brand->getBranch->name_ar}} </td>
                                    <td class="text-center">
                                        @if($brand->getType)
                                        {{$brand->getType->name_ar}}
                                        @else
                                         لا يوجد
                                        @endif
                                    </td>
                                    <td class="text-center"> {{$brand->name_ar}} </td>
                                    <td class="text-center"><a href="{{URL::to('/admin/brands' , [$brand->id , 'edit'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="text-center">
                                        {{Form::open(['route'=>['admin.brands.destroy' , $brand->id] , 'method'=>'delete' , 'id'=>'form'])}}
                                        <a href="javascript:;" onclick="if(confirm(' هل انت متاكد من عملية الحذف ؟')) $(this).closest('form').submit();"> <i class="fa fa-trash" aria-hidden="true" style="color:rgb(240, 80, 80)"></i></a>
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