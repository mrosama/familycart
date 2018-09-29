@include('site.layouts.head')
<header>
    <div class="header-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12 pull-right">
                    <a href="{{URL::to('/').'/'.$lang}}"><img src="{{url::to('/images/settings/'.\App\Setting::first()->logo)}}" alt="{{site_name()}}" title="{{site_name()}}"  class="img-responsive"></a>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h5 class="text-bold">{{trans('lang.malikiSupportCenter')}}</h5>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="sign-in">
    <div class="container">
        <div class="sign-in-con">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="search">
                        {{Form::open(array('url' => 'support_search' , 'method' => 'post'))}}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="submit">{{trans('lang.search')}}</button>
                            </span>
                            <input type="text" name="search_value" class="form-control dir-rtl" placeholder="{{trans('lang.search')}}">
                        </div><!-- /input-group -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section>
    <div class="support-header-direct">
        <div class="container">
            <p><a href="{{URL::to('/').'/'.$lang.'/supports'}}">{{trans('lang.malikiSupportCenter')}}</a> / {{trans('lang.result')}}</p>
        </div>
    </div>
</section>
<section id="support-questions" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="support-quest-item-part">
                    <h3 class="support-h3">{{$result_count}} {{trans('lang.resultFor')}}<span class="orange-price">"{{$search_value}}"</span></h3>
                    @if($result_count != 0)
                    @foreach($result as $row)
                    <div class="support-search-section">
                        <a href="{{URL::to('/').'/'.$lang.'/support/'.$row->id}}" class="support-search-link">
                            @if($lang == 'en')
                            {{$row->title_en}}
                            @else
                            {{$row->title}}
                            @endif
                        </a>
                        <?php $support = \App\Support::find($row->sectionID); ?>
                        <p class="support-muted">تحت <a href="{{URL::to('/').'/'.$lang.'/support/section/'.$row->sectionID}}">
                                @if($lang == 'en')
                                {{$support->name_en}}
                                @else
                                {{$support->name}}
                                @endif
                            </a></p>
                        <p class="support-search-description">
                            @if($lang == 'en')
                            {{\Illuminate\Support\Str::words($row->details_en, $words = 25, $end = '...')}}
                            @else
                            {{\Illuminate\Support\Str::words($row->details, $words = 25, $end = '...')}}
                            @endif
                        </p>
                        <a href="{{URL::to('/').'/'.$lang.'/support/'.$row->id}}" class="support-more-link">{{trans('lang.readMore')}}</a>
                    </div>
                    @endforeach
                    @else
                    <p>{{trans('lang.noResult')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 pull-left">

                <div class="support-questions-partion">
                    <h3 class="support-h3">{{trans('lang.noResult')}}</h3>
                    <ul class="user-prof-list">
                        <li class="row">
                            <div class="col-xs-10 pull-left">
                                {{trans('lang.contact')}}
                                <p>{{\App\Setting::first()->phone}}</p><br>
                            </div>
                            <div class="col-xs-2"><i class="fa fa-phone fa-lg"></i></div>
                        </li>
                        <li class="row">
                            <div class="col-xs-10 pull-left">
                                {{trans('lang.email')}}
                                <a href="mailto:{{\App\Setting::first()->email}}" ><p class="editt">{{\App\Setting::first()->email}}</p></a><br>
                            </div>
                            <div class="col-xs-2"><i class="fa fa-envelope-o fa-lg"></i></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@include('site.supports.footer')
