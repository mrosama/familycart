@extends('admin.layouts.master')
@section('title')
عرض جميع  الطلبات
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
                <h1> الطلبات
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
                            <span class="caption-subject bold uppercase"> الطلبات</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th class="text-center"> م  </th>
                                    <th class="text-center">  اسم المستخدم </th>
                                    <th class="text-center">  البريد الالكتروني  </th>
                                    <th class="text-center">  حالة الطلب  </th>
                                    <th class="text-center">    طريقة الدفع </th>
                                    <th class="text-center">   اجمالي الطلب   </th>
                                    <th class="text-center">   تاريخ انشاء الطلب   </th>
                                    <th class="text-center"> تغيير حالة الطلب</th>
                                    <th class="text-center"> عرض الطلب  </th>
                                    <th class="text-center"> حذف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
								
                                @foreach($orders as $order)
                                @if($order->getUser)
								<tr>
                                    <td class="text-center"> {{$x++}} </td>
                                    <td class="text-center"> {{$order->getUser->name}} </td>
                                    <td class="text-center"> {{$order->getUser->email}} </td>
                                    <td class="text-center"> 
                                        @if($order->status == 'request_receipt')
                                        <button class="btn btn-primary" type="button"> مدفوع </button>
                                        @elseif($order->status == 'follow_request')
                                        <button class="btn btn-warning" type="button"> اجراءات الشحن</button>
                                        @elseif($order->status == 'deleviry_request')
                                        <button class="btn btn-default" type="button">تم الشحن  </button>
                                        @elseif($order->status == 'end_request')
                                        <button class="btn btn-success" type="button"> استلام العميل </button>
                                        @endif
                                    </td>
                                    <td class="text-center"> 
                                        @if($order->payment_method == 'cash')
                                        تحويل بنكي
                                        @elseif($order->payment_method == 'master')
                                        ماستر كارد
                                        @elseif($order->payment_method == 'visa')
                                        فيزا كارد
                                        @endif    
                                    </td>
                                    <td class="text-center"> {{$order->total_price}}</td>
                                    <td class="text-center"> {{$order->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{URL::to('/admin/orders/status' , [$order->id])}}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="text-center"><a href="{{URL::to('/admin/orders/show' , [$order->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                    <td class="text-center"><a href="{{URL::to('/admin/orders/delete' , [$order->id])}}" onclick="if (confirm(' هل انت متاكد من عملية الحذف ؟')) {
                                                return true;
                                            } else {
                                                return false;
                                            }"> <i class="fa fa-trash" aria-hidden="true"></i></a> 
                                    </td>
                                </tr>
								@endif
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