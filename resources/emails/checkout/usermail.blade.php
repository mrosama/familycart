<!DOCTYPE html>
<html dir="rtl">
    <head>
        <title></title>
        <style>
            @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

            @font-face {
                font-family: 'tahoma', sans-serif;
                font-weight: normal;
                font-style: normal;
            }

            @media(max-width:768px){
                .ddd{width:90% !important}
            }

        </style>


    </head>
    <body style="font-family: 'tahoma' !important">

        <?php

        function isMobile() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }

        if (!isMobile()) {
            $nste = "float:left;direction: rtl;width: 45%;margin-bottom: 30px;";
            $tf_tl2 = "width: 50%;background:#c30202;float: right;text-align: right;padding:4px 10px; margin-top: 0px !important;color: white ;font-weight: bold;";
            $div_style = "clear: both; direction: rtl; width : 30% ; padding: 10px; float: right;";
            $P_style = "text-align:center;direction:ltr;font-family: 'tahoma' !important";
            $sty_div = "width: 35% !important;float: right;direction: rtl;padding: 10px;margin-right: 15px !important;";
            $img_width = "width: 10% !important";
            $pStyle = "text-align:center;font-family: 'tahoma' !important";
            $img_W = "height: 90px;width: 30%;float: left;";
            $trdd = "position: relative; direction: rtl; width: 60%";
        } else {
            $nste = "float:left;direction: rtl;width: 100%;margin-bottom: 30px;";
            $tf_tl2 = "width: 100%;background:#c30202;float: right;text-align: right;padding:4px 10px; margin-top: 0px !important;color: white ;font-weight: bold;";
            $div_style = "clear: both; width: 100% ! important; direction: rtl; padding: 10px; float: right;";
            $P_style = "text-align:center;direction:ltr;font-family: 'tahoma' !important";
            $sty_div = "width: 100% !important;float: right;direction: rtl;padding: 10px;margin-right: 15px !important;";
            $img_width = "width: 10% !important";
            $pStyle = "text-align:center;font-family: 'tahoma' !important";
            $img_W = "height: 144px;width: 100%;";
            $trdd = "position: relative; direction: rtl; width: 100% ;text-align: center;";
        }


        $contin = "border:1px solid;overflow: hidden;";
        $latstt = "border-bottom: transparent !important;background: gray;margin-top: 0px !important;";
        $p = "border-bottom-color: -moz-use-text-color;border-bottom-style: solid;border-bottom-width: 1px;padding-right: 5px;margin-bottom: 0px !important;";
        $row = "font-family: 'tahoma' !important";
        ?>

        <div style="{{$row}}">
            <h3 style="text-align: center;padding:7px;color: white;background: #14872B;">شكرا لتسوقكم من متجر غرفة ارزاق</h3>
        </div>
        <div style="{{$row}}">
            <div style="{{$contin}}">
                <table border="0" style="width:100% ; direction:rtl; border:none;" >
                    <tr>
                        <td  style="vertical-align:top;font-family: 'tahoma' !important"><p style="background: #f5464b none repeat scroll 0 0; color: white; text-align: right; padding: 4px 10px; ">تفاصيل الطلب</p></td>
                            <!--<td style="text-align:left">
                            <div class="ddd lljj3" >
                            {{--HTML::image(App\Setting::find(1)->site_logo,'payball' , ['style' => $img_W])--}}
                        </div></td>-->
                    </tr>
                    <tr >
                        <td  style="text-align: right; font-family: 'tahoma' !important">
                            <p style="margin-bottom: 0 !important;margin-top: 0 !important;"> {{date('Y/m/d h:i A')}}  </p>
                            <p style="margin-bottom: 0 !important;margin-top: 0 !important;">اسم العميل : <b>{{$user_data->name}}</b> </p>
                            <p  style="margin-bottom: 0 !important;margin-top: 0 !important;">الجوال : {{$user_data->code . $user_data->mobile}}</p>
                            <p class="oml"  style="margin-bottom: 0 !important;margin-top: 0 !important;">رقم الطلب : <b>{{$order_id}}</b></p>
                            <p  style="margin-bottom: 0 !important;margin-top: 0 !important;">طريقة الدفع : <br> <b>{{$payment_method}}</b></p>
                        </td >
                        <td style="text-align: right;font-family: 'tahoma' !important">
                            <p style="margin-bottom: 0 !important;margin-top: 0 !important;">
                                العنوان : <br> {{'<a  href="http://maps.google.com/maps?z=12&q=loc:'. $user_data->Latitude .'+'.$user_data->Longitude.'"> رابط الموقع على الخريطة </a>'}}
                            </p>
                        </td>
                    </tr>
                </table>
                <table border="transparent" style="width:100% ; direction:rtl; border:none; text-align: right;" >
                    <tr style="border:transparent;  border-bottom:1px solid">
                        <th style="border:none; border-bottom:1px solid; width: 45%;">اسم المنتج</th>
                        <th style="border:none; border-bottom:1px solid;">الكمية</th>
                        <th style="border:none; border-bottom:1px solid; width: 25%;">السعر</th>
                    </tr>
                    @foreach(json_decode($products) as $product)
                    <tr style="border:transparent;  border-bottom:1px solid">
                        <td style=" font-family: 'tahoma' !important; padding: 5px;text-align: right; border:none; border-bottom:1px solid">{{App\Product::find($product[0])->name}}</td>
                        <td style=" font-family: 'tahoma' !important; padding: 5px;text-align: right; border:none; border-bottom:1px solid">{{$product[1]}}</td>
                        <td style=" font-family: 'tahoma' !important; padding: 5px;text-align: right; border:none; border-bottom:1px solid">{{$product[2]}} ريال</td>
                    </tr>
                    @endforeach
                </table>
                <div style="{{$nste}}">
                    <p style="{{$p}}"> الاجمالي<span style="float:left; padding-left:20px">{{Cart::instance('shopping')->total()}} ريال</span></p>

                    <p style="{{$p}}">مبلغ التوصيل <span style="float:left; padding-left:20px">{{$total_amount - Cart::instance('shopping')->total() }} ريال</span></p>

                    <p style="{{$p}}">قيمة الخصم <span style="float:left; padding-left:20px">{{ App\Charge::find(1)->discount_price }} ريال</span></p>

                    <p style="{{$latstt}}">المجموع<span style="float:left; padding-left:20px"> {{$total_amount - App\Charge::find(1)->discount_price}} ريال</span></p>
                </div>
            </div>
        </div>
        <br>
        <div  style="position: relative; direction: rtl; width: 100% ;text-align: center;" >
            <!--<div  style="border: 1px solid ">
                <p style="{{--$P_style--}}">لا تترددوا بالتواصل معنا</p>
                <p style="{{--$P_style--}}">
                    {{--HTML::image('site/images/message.png','payball' , ['style' => $img_width])--}}
                <span class="spa" style="position: absolute;top: 41px;margin-left: 5px">
                    <a href="mailto:{{--App\Setting::find(1)->email--}}">{{--App\Setting::find(1)->email--}} </a>
                </span></p>
                <p style="{{--$P_style--}}">
                {{--HTML::image('site/images/whatsapp.png','payball',['style' => $img_width])--}}
                <span class="spa2" style="position: absolute;top: 90px;margin-left: 5px"> 
                    <a href="tel:{{--App\Setting::find(1)->phone--}}">{{--App\Setting::find(1)->phone--}}</a>
                </span></p>
                <p style="{{--$pStyle--}}">تابعونا</p>

                <p style="{{--$pStyle--}}">
                    <a href="{{--App\Setting::find(1)->instgram--}}">{{--HTML::image('site/images/insta.png','payball' , ['style' => $img_width])--}}</a>

         <a href="{{--App\Setting::find(1)->twitter--}}">{{--HTML::image('site/images/twitter.jpg','payball' , ['style' => $img_width])--}}</a></p>
     </div>-->
            <div  style="border: 1px solid ">
                <table>
                    <tbody><tr>
                            <td colspan="2"><p style="text-align:center;font-family:'tahoma'  !important;">لا تترددوا بالتواصل معنا</p></td>
                        </tr>
                        <tr>
                            <td width="55%" style="text-align: left;">
                                <a href="mailto:{{App\Setting::find(1)->email}}">{{App\Setting::find(1)->email}} </a>
                            </td>
                            <td style="text-align: right;">
                                {{Html::image('site/images/message.png','payball' , ['style' => $img_width])}}
                            </td>
                        </tr>
                        <tr>
                            <td  style="text-align: left;">
                                <a href="tel:{{App\Setting::find(1)->phone}}">{{nl2br(App\Setting::find(1)->phone)}}</a>       
                            </td>
                            <td style="text-align: right;">
                                {{Html::image('site/images/whatsapp.png','payball',['style' => $img_width])}}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;"><p style="font-family:'tahoma'  !important;">تابعونا</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">                    
                                <a href="{{App\Setting::find(1)->instgram}}">{{Html::image('site/images/insta.png','payball' , ['style' => $img_width])}}</a>
                            </td>
                            <td style="text-align: right;">
                                <a href="{{App\Setting::find(1)->twitter}}">{{Html::image('site/images/twitter.jpg','payball' , ['style' => $img_width])}}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

