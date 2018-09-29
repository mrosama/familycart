<!DOCTYPE html>
<!-- 
Author: toegy
Website: http://www.toegy.com/
developer : adelwork90@gmail.com 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <?php $siteName = \App\Setting::find(1)->site_name; ?>
        <title>  {{$siteName}} | لوحة التحكم</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('/admin_template')}}/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{URL::to('/admin_template')}}/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{URL::to('admin/login')}}">
                <img src="{{URL::to('/admin_template')}}/logo.png" width="250px;" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content" style="direction: rtl;">
            <!-- BEGIN LOGIN FORM -->
            {{Form::open(array('url' => 'admin/doLogin' , 'class' => 'login-form' , 'method' => 'post'))}}
            {!! csrf_field() !!}
            <h3 class="form-title font-green">لوحة التحكم | تسجيل الدخول</h3>
            @if (Session::get('error'))
            <div class="text-center" >
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            </div>
            @endif
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert" style="float:left;"></button>
                <span> ادخل البريد الالكتروني وكلمة المرور</span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">البريد الالكتروني</label>
                {{Form::email('email' , '' , ['class' => 'form-control form-control-solid placeholder-no-fix' , 'placeholder' => 'البريد الالكتروني' , 'autocomplete' => 'off'])}}
                <div style="color:red;">{{$errors->first('email')}}</div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                {{Form::password('password' , ['class' => 'form-control form-control-solid placeholder-no-fix' , 'placeholder' => 'كلمة المرور' , 'autocomplete' => 'off'])}}
                <div style="color:red;">{{$errors->first('password')}}</div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">دخول</button>
            </div>
            {{Form::close()}}
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> جميع الحقوق محفوظة لموقع العربة العائلية © 2017</div>
        <!--[if lt IE 9]>
<script src="{{URL::to('/admin_template')}}/global/plugins/respond.min.js"></script>
<script src="{{URL::to('/admin_template')}}/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{URL::to('/admin_template')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{URL::to('/admin_template')}}/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{URL::to('/admin_template')}}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::to('/admin_template')}}/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{URL::to('/admin_template')}}/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
