@include('site.layouts.head')
@include('site.supports.header')
<section id="support-questions" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="support-quest-item-part">
                    <h4><strong>
                            @if($lang == 'en')
                            {{$supportQuestion->title_en}}
                            @else
                            {{$supportQuestion->title}}
                            @endif
                        </strong></h4>
                    <p class="support-muted"> {{$supportQuestion->created_at}}</p>
                    <p class="support-search-description">
                        @if($lang == 'en')
                        {{$supportQuestion->details_en}}
                        @else
                        {{$supportQuestion->details}}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 pull-left">
                <div class="support-questions-partion">
                    <h3 class="support-h3"> {{trans('lang.relatedArticles')}}</h3>
                    <ul class="support-quest-list">
                        @foreach($relatedQuestion as $row)
                        <li><a href="{{URL::to('/').'/'.$lang.'/support/'.$row->id}}">
                                @if($lang == 'en')
                                {{$row->title_en}}
                                @else
                                {{$row->title}}
                                @endif
                            </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="support-questions-partion">
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