@if($lang == 'en')
Thank you for Procurement process has been successfully completed. You can follow applicant through
<a href="{{URL::to($lang.'/profile/myOrder')}}"> Link </a>
@else
شكرا لك لقد تمت عملية الشراء بنجاح بامكانك متابعة الطلب من خلال
<a href="{{URL::to($lang.'/profile/myOrder')}}"> هذا الرابط </a>
@endif