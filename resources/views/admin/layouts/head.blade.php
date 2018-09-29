<!DOCTYPE html>
<!-- 
Author: toegy
Website: http://www.toegy.com/
developer : adelwork90@gmail.com 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title> @yield('title')  -  لوحة التحكم   </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('/admin_template')}}/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{URL::to('/admin_template')}}/pages/css/portfolio-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/themes/light-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('/admin_template')}}/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/themes/light-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::to('/admin_template')}}/layouts/layout4/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 

        <style type="text/css">
            @import url('http://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en');
            @font-face {
                font-family: Droid Arabic Kufi;
                src: url({{URL::to('/admin_template')}}/fonts/DroidKufi-Regular.ttf);
                }
                body,h1,h2,h3,p,li{
                    font-family: 'Droid Arabic Kufi';
                }
            </style>


            <!-- tinymce -->
<!--            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init({selector: 'textarea'});</script>-->

            <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
        </head>
        <!-- END HEAD -->
