@if($lang == 'en')
<h3>Maliki store</h3>
<h4>Password was successfully changed</h4><br>
To go to the site <a href="{{URL::to('/en')}}"> Click on the following link</a>
@else
<h3>متجر المالكي</h3>
<h4>تم تغيير كلمة المرور بنجاح</h4><br>
للذهاب الي الموقع  <a href="{{URL::to('/')}}">اضغط على الرابط التالي</a>
@endif