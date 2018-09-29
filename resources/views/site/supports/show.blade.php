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
        <div class="sign-in-hd">
            <h2>{{trans('lang.malikiSupportCenter')}}</h2>
            <p>{{trans('lang.searchSupportDescription')}}</p>
        </div>
        <div class="sign-in-con">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="search">
                        {{Form::open(array('url' => $lang.'/support_search' , 'method' => 'post'))}}
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
<section id="support" class="dir-rtl">
    <div class="container">
        <div class="row">
            @foreach($supports as $row)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="support-item">
                    <a href="#" id="id-{{$row->id}}">
<!--                        <i class="fa fa-truck"></i> -->
                        <img width="30px;" height="30px;" src="{{URL::to('/images/supports').'/'.$row->logo}}" />
                        <h2>
                            @if($lang == 'en')
                            {{$row->name_en}}
                            @else
                            {{$row->name}}
                            @endif
                        </h2>
                        <p>
                            @if($lang == 'en')
                            {{$row->description_en}}
                            @else
                            {{$row->description}}
                            @endif
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="support-questions" class="dir-rtl">
    <div class="container">
        <div class="row">
            @foreach($supports as $row)
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="support-quest-item" id="quest-id-{{$row->id}}">
                    <h2><a href="{{URL::to('/').'/'.$lang.'/support/section/'.$row->id}}">
                            @if($lang == 'en')
                            {{$row->name_en}}
                            @else
                            {{$row->name}}
                            @endif
                        </a></h2>
                    <ul class="support-quest-list">
                        <?php $supportQ = \App\SupportQuestion::where('sectionID', $row->id)->get(); ?>
                        @foreach($supportQ as $row)
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
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('site.supports.footer')