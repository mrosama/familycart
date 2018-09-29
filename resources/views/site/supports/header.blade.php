<header>
    <div class="header-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12 pull-right">
                    <a href="{{URL::to('/').'/'.$lang}}"><img src="{{url::to('/images/settings/'.\App\Setting::first()->logo)}}" alt="{{site_name()}}" title="{{site_name()}}" class="img-responsive"></a>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h5 class="text-bold">{{trans('lang.malikiSupportCenter')}}</h5>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="support-header-direct">
        <div class="container">
            <p><a href="{{URL::to('/').'/'.$lang.'/supports'}}">{{trans('lang.malikiSupportCenter')}}</a> / @if($lang == 'en'){{$support->name_en}}@else{{$support->name}}@endif</p>
        </div>
    </div>
</section>