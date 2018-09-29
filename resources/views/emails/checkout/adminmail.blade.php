<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

		@font-face {
			font-family: 'Droid Arabic Kufi', sans-serif;
			font-weight: normal;
			font-style: normal;
		}
	</style>


</head>
<body dir="rtl">

	<?php 


	if(!isMobile())
	{
		$row     = "font-family: 'tahoma' !important;";
		$new_add = "text-align: center;padding:7px;color: white;background: gray;";
		$contin  = "border:1px solid;overflow: hidden;";
		$img     = "height: 100px;margin-bottom: 10px;margin-left: 10px;margin-right: 10px;margin-top: 10px;width: 60%;display: block;margin: auto;padding-right: 30px;";
		$latstt  = "border-bottom: transparent !important;background: gray;margin-top: 0px !important;";
		$p       = "border-bottom-color: -moz-use-text-color;border-bottom-style: solid;border-bottom-width: 1px;padding-right: 5px;margin-bottom: 0px !important;";
		$nste    = "float:left;direction: rtl;width: 45%;margin-bottom: 30px;";
		$tf_tl   = "width: 50%;background:#DDDDDD;float: right;text-align: right;padding:4px 10px;margin-top: 0px !important";
		$ll11_ll2_p = "margin-bottom: 0 !important;margin-top: 0 !important;";
		$ll11_p = "margin-bottom: 0 !important;margin-left: 0 !important;margin-right: 0 !important;margin-top: 0 !important;clear: both;";
		$ll11 = "width: 25% !important;float: right;direction: rtl;padding:10px;margin-right: 5px !important;";
		$ll11_add = "width: 35% !important;float: right;direction: rtl;padding:10px;margin-right: 5px !important;";
		$ll2 = "clear: both;";		
	}
	else
	{

		$row     = "font-family: 'tahoma' !important;";
		$new_add = "text-align: center;padding:7px;color: white;background: gray;";
		$contin  = "border:1px solid;overflow: hidden;";
		$img     = "height: 100px;margin-bottom: 10px;margin-left: 10px;margin-right: 10px;margin-top: 10px;width: 100%;display: block;margin: auto;padding-right: 30px;";
		$latstt  = "border-bottom: transparent !important;background: gray;margin-top: 0px !important;";
		$p       = "border-bottom-color: -moz-use-text-color;border-bottom-style: solid;border-bottom-width: 1px;padding-right: 5px;margin-bottom: 0px !important;";
		$nste    = "float:left;direction: rtl;width: 100%;margin-bottom: 30px;";
		$tf_tl   = "width: 100%;background:#DDDDDD;float: right;text-align: right;padding:4px 10px;margin-top: 0px !important";
		$ll11_ll2_p = "margin-bottom: 0 !important;margin-top: 0 !important;";
		$ll11_p = "margin-bottom: 0 !important;margin-left: 0 !important;margin-right: 0 !important;margin-top: 0 !important;clear: both;";
		$ll11 = "width: 100% !important;float: right;direction: rtl;padding:10px;margin-right: 5px !important;";
		$ll11_add = "width: 100% !important;float: right;direction: rtl;padding:10px;margin-right: 5px !important;";
		$ll2 = "clear: both;";	
	}

	?>
	<div style="{{$row}}">
		<h3 style="{{$new_add}}">عملية شراء جديدة</h3>
	</div>
	<div style="{{$row}}">
		<div style="{{$contin}}">
			<!--<p style="{{$tf_tl}}">تفاصيل الطلب</p>-->
			<!--<div style="{{$row}}">

				<div style="{{$ll11}}{{$ll2}}">
					<p style="{{$ll11_ll2_p}}"> {{date('Y/m/d h:i A')}} </p>
					<p style="{{$ll11_ll2_p}}">اسم العميل : {{$user_data->name}} </p>
					<p style="{{$ll11_ll2_p}}">الجوال : {{$user_data->code . $user_data->mobile}}</p>
				</div>

				<div style="{{$ll11}}">
					<p style="{{$ll11_p}}">رقم الطلب : {{$order_id}}</p>
					<p style="position:absolute;{{$ll11_p}}">طريقه الدفع :<br> {{$payment_method}}</p>
				</div>
				<div style="{{$ll11_add}}">
					العنوان : <br> {{'<a  href="http://maps.google.com/maps?z=12&q=loc:'. $user_data->Latitude .'+'.$user_data->Longitude.'"> رابط الموقع على الخريطة </a>'}}
				</div>
			</div>
			-->
			
				<table border="0" style="width:100% ; direction:rtl; border:none;" >
					<tr>
						<td  style="vertical-align:top"><p style="background: rgb(221, 221, 221) none repeat scroll 0% 0%; text-align: right; padding: 4px 10px; ">تفاصيل الطلب</p></td>
						
					</tr>
					<tr >
						<td  style="text-align: right;">
							<p style="margin-bottom: 0 !important;margin-top: 0 !important;"> {{date('Y/m/d h:i A')}}  </p>
							<p style="margin-bottom: 0 !important;margin-top: 0 !important;">اسم العميل : {{$user_data->name}} </p>
							<p  style="margin-bottom: 0 !important;margin-top: 0 !important;">الجوال : {{$user_data->code . $user_data->mobile}}</p>
							<p class="oml"  style="margin-bottom: 0 !important;margin-top: 0 !important;">رقم الطلب : {{$order_id}}</p>
							<p  style="margin-bottom: 0 !important;margin-top: 0 !important;">طريقة الدفع : <br> {{$payment_method}}</p>
						</td >
						<td style="text-align: right;">
							<p style="margin-bottom: 0 !important;margin-top: 0 !important;">
							العنوان : <br> {{'<a  href="http://maps.google.com/maps?z=12&q=loc:'. $user_data->Latitude .'+'.$user_data->Longitude.'"> رابط الموقع على الخريطة </a>'}}
							</p>
						</td>
					</tr>
			
				</table>

			<table border="transparent" style="width:100% ; direction:rtl; text-align:center; border:none" >
				<tr style="border:transparent;  border-bottom:1px solid">
					<th style="border:transparent; border-bottom:1px solid ; width: 25%;"><p>الصوره</p></th>
					<th style="border:transparent; border-bottom:1px solid ; width: 30%;"><p>اسم المنتج</p></th>
					<th style="border:transparent; border-bottom:1px solid ; width: 25%;"><p>الكمية</p></th>
					<th style="border:transparent; border-bottom:1px solid ; width: 25%;"><p>السعر</p></th>
				</tr>

				@foreach(json_decode($products) as $product)
				<tr style=" ">
					<td style="width: 190px;padding: 5px;text-align:center;font-family: 'tahoma' !important; border:transparent; border-bottom:1px solid">{{HTML::image(App\Product::find($product[0])->image,'' , ['style'=>$img])}}</td>
					<td style="padding: 5px;text-align:center;font-family: 'tahoma' !important; border:transparent; border-bottom:1px solid">{{App\Product::find($product[0])->name}}</td>
					<td style="padding: 5px;text-align: center;font-family: 'tahoma' !important; border:transparent; border-bottom:1px solid">{{$product[1]}}</td>
					<td style="padding: 5px;text-align: center;font-family: 'tahoma' !important; border:transparent; border-bottom:1px solid"> {{$product[2]}} ريال</td>
				</tr>
				@endforeach

			</table>
			<div style="{{$nste}}">
				<p style="{{$p}}"> الاجمالي<span style="float:left; padding-left:20px;">{{Cart::instance('shopping')->total()}} ريال</span></p>
				
				<p style="{{$p}}">مبلغ التوصيل <span style="float:left; padding-left:20px">{{$total_amount - Cart::instance('shopping')->total() }} ريال</span></p>

				<p style="{{$p}}">قيمة الخصم <span style="float:left; padding-left:20px">{{ App\Charge::find(1)->discount_price }} ريال</span></p>

				<p style="{{$latstt}}">المجموع<span style="float:left; padding-left:20px"> {{$total_amount - App\Charge::find(1)->discount_price}} ريال</span></p>
			</div>
		</div>
	</div>

</body>
</html>