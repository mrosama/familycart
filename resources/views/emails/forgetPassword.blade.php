@if($lang == 'en')
Hello    {{$user_name}}
<br>
You are asked to reset the password of your
<br>
Please click on the link below to update your data
<br>
<a href="{{ URL::to('/en/resetPassword/'.$pass_code) }}" class="mrorr">Reset password link</a>

@else
مرحبا   {{$user_name}}
<br>
لقد قمت بطلب إعادة كلمة المرور الخاصة بك
<br>
فضلا اضغط على الرابط ادناه لتحديث بياناتك
<br>
<a href="{{ URL::to('/ar/resetPassword/'.$pass_code) }}" class="mrorr">رابط ضبط إعادة كلمة المرور</a>
@endif


