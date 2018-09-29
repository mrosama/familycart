<!-- footer-->
<footer>
    <section id="sign-in">
        <div class="container">
            <div class="sign-in-hd">
                <h2>{{trans('lang.subscribeMsg')}}</h2>
            </div>
            <div class="sign-in-con">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="search">
                            {{Form::open(['url' => 'newsletter' , 'method' => 'post'])}}
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-search" onclick="subscribe()"  type="submit">{{trans('lang.subscribe')}}</button>
                                </span>
                                <input type="email" name="email" id="email_newsletter" class="form-control dir-rtl" placeholder="{{trans('lang.email')}}">
                            </div><!-- /input-group -->
                            {{Form::close()}}
                        </div>
                        <script>
                            function subscribe() {
                                var lang = $('#lang').val();
                                var email_newsletter = $('#email_newsletter').val();
                                if (email_newsletter == '')
                                {
                                    if (lang == 'en')
                                    {
                                        alert(' Please enter a valid email address');
                                    } else
                                    {
                                        alert(' الرجاء إدخال عنوان بريد صحيح');
                                    }
                                }
                            }
                        </script>
                        <?php
                        if (Session::has('newsletter_msg')) {
                            echo '<script language="javascript">';
                            echo 'alert(" ' . Session::get("newsletter_msg") . ' ")';
                            echo '</script>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="main-footer">
        <div class="container dir-rtl">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4 class="footer-hd">{{trans('lang.main_menu')}}</h4>
                    <div class="footer-con">
                        <ul class="list-unstyled">
                            <!-- Get All Sections -->
                            <li><a href="{{URL::to('/').'/'.$lang}}">{{trans('lang.home')}}</a></li>
                            <?php $sections = App\Section::where('status', 1)->get(); ?>
                            @foreach($sections as $section)     
                            <?php
                            $section_url = str_replace(' ', '-', $section->name_en);
                            $section_url = preg_replace('/[^A-Za-z0-9\-]/', '', $section_url);
                            ?>
                            <li><a href="{{URL::to($lang.'/section' , [$section->id , $section_url])}}">
                                    @if($lang == 'en')
                                    {{$section->name_en}}
                                    @else
                                    {{$section->name_ar}}
                                    @endif
                                </a></li>
                            @endforeach
                            <li><a href="{{URL::to('/').'/'.$lang.'/offers'}}"> {{trans('lang.last_offers')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="footer-hd">{{trans('lang.Important_links')}}</h4>
                    <div class="footer-con">
                        <ul class="list-unstyled">
                            <?php $pages = \App\Page::all(); ?>
                            @foreach($pages as $page)
                            <li>
                                <a href="{{URL::to('/').'/'.$lang.'/page/'.$page->id}}"> 
                                    @if($lang == 'en')
                                    {{$page->title_en}}
                                    @else
                                    {{$page->title}}
                                    @endif
                                </a>
                            </li>
                            @endforeach
                            <li>
                                <a href="{{URL::to('/').'/'.$lang.'/contactUs'}}"> {{trans('lang.contact')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="footer-hd">{{trans('lang.follow')}}</h4>
                    <div class="footer-con">
                        <ul class="list-unstyled social-footer">
                            <li><a href="{{\App\Setting::find(1)->facebook}}"><img src="{{URL::to('/site_template')}}/assets/img/facebook.png" alt="Social media"> {{trans('lang.facebook')}}</a></li>
                            <li><a href="{{\App\Setting::find(1)->twitter}}"><img src="{{URL::to('/site_template')}}/assets/img/twitter.png" alt="Social media"> {{trans('lang.twitter')}}</a></li>
                            <li><a href="{{\App\Setting::find(1)->instagram}}"><img src="{{URL::to('/site_template')}}/assets/img/instagram.png" alt="Social media"> {{trans('lang.instagram')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="footer-hd">{{trans('lang.customers_service')}}</h4>
                    <div class="footer-con">
                        <div class="text-center">
                            <p>{{trans('lang.work_time')}}</p>
                            <a href="tel:{{\App\Setting::find(1)->phone}}" class="tel-txt"> {{\App\Setting::find(1)->phone}}</a>
                        </div>
                    </div>
                    <h4 class="footer-hd">{{trans('lang.method_pay')}}</h4>
                    <div class="footer-con">
                        <div class="text-center">
                            <a><img src="{{URL::to('/site_template')}}/assets/img/visa.png" alt="visa" class="pay-img"></a>
                            <a><img src="{{URL::to('/site_template')}}/assets/img/MasterCard.png" alt="MasterCard" class="pay-img"></a>
                            <a><img src="{{URL::to('/site_template')}}/assets/img/raghy.jpg" alt="mda" class="pay-img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>      
    <!-- copyrights-->
    <section class="copyrights">
        <div class="container-fluid">
            <div class="col-md-12 col-xs-12 "><h6>جميع الحقوق محفوظة لموقع العربة العائلية </a></h6></div>

        </div>
    </section>
</footer> 
<!--
    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
}
</script>
-->


<?php
if (Session::has('empty_qty_msg')) {
    echo '<script language="javascript">';
    echo 'alert(" ' . Session::get("empty_qty_msg") . ' ")';
    echo '</script>';
}
?>





<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/zoom.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/main.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/site_script.js"></script>

<script type="text/javascript" src="{{URL::to('/site_template')}}/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="{{URL::to('site_template/noUiSlider' , ['nouislider.min.js'])}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.9.3/typeahead.min.js"></script>
<script type="text/javascript" src="{{URL::to('/site_template')}}/ion.rangeSlider.min.js"></script>


@yield('js')




<!-- Start of LiveChat (www.livechatinc.com) code -->
<!--<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 8359871;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>-->
<!-- End of LiveChat code -->

</body>
</html>
