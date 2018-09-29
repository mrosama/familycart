@extends('site.layouts.master')
@section('content')

@include('users.profile.sidebar')

<div class="col-md-9">
  @if($orders->count() > 0)
  <div class="table-responsive">
    <table class="table table-bordered" id="datatable" >
     <thead >
      <tr>
        <th class="text-center">رقم العملية</th>
        <th class="text-center">اجمالى الفاتورة</th>
        <th class="text-center">حالة الطلب </th>
        <th class="text-center">خيارات </th>
      </tr>
    </thead>


    <tbody>
     @foreach($orders as $order)
     <tr class="text-center">
       <td>{{$order->id}}</td>
       <td>{{$order->total_amount - $order->discount_price}} ريال</td>
       <td>
        <?php if($order->payment_method == 1)
        echo 'ماستر كارد';
        elseif($order->payment_method == 2) 
         echo 'فيزا';
       elseif($order->payment_method == 3)
         echo 'باي بال';
       elseif($order->payment_method == 4)
         echo 'تحويل بنكي';
       ?>

     </td>
     <td>
       <button class="btn btn-success btn-sm" data-toggle="modal"   data-target="#myModal_{{$order->id}}">عرض التفاصيل</button>
     </td>
   </tr>
   <!-- Modal -->
   <div id="myModal_{{$order->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" style="float:left;" class="close" data-dismiss="modal">&times;</button>
          <h4 style="direction:rtl;text-align:right;" class="modal-title">التفاصيل </h4>
        </div>
        <div style="direction:rtl;text-align:right;" class="modal-body">
          <?php $sum=[]; ?>
          @foreach(json_decode($order->products) as $product)
          @if(\App\Product::find($product[0]) != null)
          <p>{{ 'اسم المنتج :' . \App\Product::find($product[0])->name}}</p>
          @else
          <p>اسم المنتج : <del style="color:red">تم حذف المنتج</del></p>
          @endif
          <p> {{ 'السعر  :' .  $product[2]}} ريال</p>
          <p>{{ 'الكمية  :' . $product[1]}}</p><hr>
          <?php array_push($sum , $product[2]) ?>
          @endforeach   

          <p class="charge-p"> الاجمالى: {{array_sum($sum)}} ريال</p>
          <p class="charge-p"> قيمة التوصيل: {{$order->total_amount - array_sum($sum)}} ريال</p>
          <p class="charge-p"> قيمة الخصم: {{$order->discount_price}} ريال</p>
          <p class="charge-p">المجموع: {{$order->total_amount - $order->discount_price}} ريال</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
      </div>

    </div>
  </div>
  @endforeach

</tbody>
</table>              
</div>


@else

<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 pull-right"><!--start right-sell-->
  <div class="alert alert-danger text-center col-lg-12 col-md-12 col-sm-12 col-xs-12" dir="rtl" style="margin-top:50px">
    عفوا لا يوجد لديك اى مشتريات.<br>
    قم الان بعرض ما سلع من منتجات واشترى ما يلزمك. 
    <a href="{{URL::to('/')}}/allProducts"> عرض السلع!</a>
    <button class="close" data-close="alert"></button>
  </div>    
</div>

@endif
</div>






</div><!--end table-->

</div>
</div>


@stop