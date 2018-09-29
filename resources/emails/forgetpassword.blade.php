<!-- <!DOCTYPE html><html lang="en-US"><head>	<meta charset="utf-8"></head><body>	<h2>تغيير كلمة المرور الخاصة من غرفة أرزاق | متجر غرفة ارزاق</h2>	<div>		لقد قمت باستلام هذه الرسالة لانك قمت بطلب باسوورد جديد		<br>		{{ URL::to('/resetPassword/'.$pass_code) }}.<br/>	</div></body></html> -->
<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <style>	
            @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);	
            @font-face {font-family: 'Droid Arabic Kufi', sans-serif;
                        font-weight: normal;
                        font-style: normal;		}	
            </style>
        </head>


        <body style="font-family: 'Droid Arabic Kufi', sans-serif;font-size: 14px;">
            <?php

            function isMobile() {
                return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
            }

            if (!isMobile()) {
                $ameln = "direction: rtl;float: right;padding-bottom: 10px;padding-left: 10px;padding-right: 50px;padding-top: 10px;width: 60%;";
                $ameln2 = "width: 40%;";
                $img_width = "width: 10% !important";
            } else {
                $ameln = "direction: rtl;float: right;padding-bottom: 10px;padding-left: 10px;padding-right: 50px;padding-top: 10px;width: 100%;";
                $ameln2 = "width: 100%;";
                $img_width = "width: 100% !important";
            }
            ?>


        <table style="direction:rtl;font-family: 'tahoma' !important">
            <tr>
                <td style="text-align:right;">

                    مرحبا   {{$user_name}}
                    <br>
                    لقد قمت بطلب إعادة كلمة المرور الخاصة بك
                    <br>
                    فضلا اضغط على الرابط ادناه لتحديث بياناتك

                </td>

                <td style="text-align: left; direction: ltr; width: 50%;">
                    {{Html::image(App\Setting::find(1)->site_logo,'payball' , ['style' => 'display: block;margin: auto;width: 50%; padding-right: 50%;'])}}
                </td>

            </tr>

            <tr>
                <td colspan="2" >
                    <p style="text-align:center;">

                        <a href="{{ URL::to('/resetPassword/'.$pass_code) }}" class="mrorr">رابط ضبط إعادة كلمة المرور</a>
                    </p>
                </td>
            </tr>

            <tr>
                <td colspan="2">

                    <p style="text-align:right;">إذا كان لديك أي أسئلة أو استفسار لا تتردد بالتواصل مباشرة مع فريق خدمة العملاء  :</p>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center">
                    <table style="width:100%">
                        <tr>
                            <td style="text-align:left ;" width="60%">{{App\Setting::find(1)->email}} </td>
                            <td  style="text-align:right">{{HTML::image('site/images/message.png','payball' , ['style' => $img_width])}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left" width="60%">{{nl2br(App\Setting::find(1)->phone)}}</td>
                            <td  style="text-align:right">{{HTML::image('site/images/whatsapp.png','payball' , ['style' => $img_width])}}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <p class="ntmna" style="text-align:right; direction: rtl;margin-top: 65px;/*padding-right: 40px;*/ font-family: 'tahoma' !important">
                        نتمنى لك تجربة تسوق رائعة !  </p>
                    <p class="ntmna ntmna2" style="margin-top: 30px ;text-align:right;">
                        <a style=" text-align:right;text-decoration: none;color: red;float: right;/*margin-right: 40px;*/ font-family: 'tahoma' !important" href="{{ URL::to('/') }}">العربة العائلية</a>
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>