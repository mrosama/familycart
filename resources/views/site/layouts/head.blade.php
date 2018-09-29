<!DOCTYPE html>
<html>
    <head>
        
        <title>  {{site_name()}} @if(isset($title) && !empty($title)){{' | ' .$title}}@endif</title>
    <input type="hidden" id="base_url" value="{{URL::to('/')}}" />
    <input type="hidden" id="lang" value="{{$lang}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="keywords" content="{{site_name()}}">
    <meta name="description" content="{{site_name()}}">
    <link rel="icon" href="{{URL::to('/site_template/assets/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/assets/css/custom-theme/jquery-ui-1.10.0.custom.css" type="text/css" />
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/assets/css/font-awesome.min.css"/>
    @if($lang == 'en')
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/style_en.css" type="text/css" />
    @else
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/style.css" type="text/css" />
    @endif
    <link href="{{URL::to('/site_template')}}/assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{URL::to('/site_template')}}/assets/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="{{URL::to('/site_template/noUiSlider' , ['nouislider.min.css'])}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="{{URL::to('/site_template')}}/normalize.css" type="text/css" />
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/ion.rangeSlider.css" type="text/css" />
    <link rel="stylesheet" href="{{URL::to('/site_template')}}/ion.rangeSlider.skinFlat.css" type="text/css" />


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
$(function () {
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-116:+0",
        maxDate: 0,
    });
});

    </script>

</head>
<body>