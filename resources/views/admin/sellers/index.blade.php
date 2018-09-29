@extends('admin.layouts.master')
@section('title')
عرض جميع البائعين 
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
                <h1>البائعين 
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
                            <span class="caption-subject bold uppercase">البائعين </span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center"> م  </th>
                                    <th class="text-center">  الاسم التجاري </th>
                                    <th class="text-center">   نوع التجارة </th>
                                    <th class="text-center">   التلفون  </th>
                                    <th class="text-center">   البريد الالكتروني  </th>
                                    <th class="text-center">   العنوان  </th>
                                    <th class="text-center"> تعديل </th>
                                    <th class="text-center"> حذف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                @foreach($sellers as $seller)
                                <tr>
                                    <td class="text-center"> {{$x++}} </td>
                                    <td class="text-center"> {{$seller->trade_name}} </td>
                                    <td class="text-center"> {{$seller->trade_type}} </td>
                                    <td class="text-center"> {{$seller->phone}} </td>
                                    <td class="text-center"> {{$seller->email}} </td>
                                    <td class="text-center"> {{$seller->address}} </td>
                                    <td class="text-center"><a href="{{URL::to('/admin/sellers' , [$seller->id , 'edit'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="text-center">
                                        {{Form::open(['route'=>['admin.sellers.destroy' , $seller->id] , 'method'=>'delete' , 'id'=>'form'])}}
                                        <a href="javascript:;" onclick="if (confirm(' هل انت متاكد من عملية الحذف ؟سيتم حذف المنتجات المتعلقة بهذا البائع'))
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