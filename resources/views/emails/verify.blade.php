<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        @if($lang == 'en')
        <h2>Verify Your Email Address</h2>
        <div>
            Thanks for creating an account with Elmalki-store site.
            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>
        </div>
        @else
        <h2>التحقق من عنوان البريد الإلكتروني الخاص بك</h2>
        <div>
            شكرا لك لإنشاء حساب مع موقع  المالكي . يرجى اتباع الرابط أدناه للتحقق من عنوان البريد الإلكتروني الخاص بك
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>
        </div>
        @endif
    </body>
</html>