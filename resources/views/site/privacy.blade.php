@extends('site.layouts.master')
@section('content')
<section id="main-basket" class="dir-rtl">
    <div class="container text-center">
        <h2 >{{trans('lang.privacy')}}</h2>
        <hr><br>
        @if($lang == 'en')
        <p>{!!html_entity_decode(App\Setting::find(1)->privacy_en)!!}</p>
        @else
        <p>{!!html_entity_decode(App\Setting::find(1)->privacy)!!}</p>
        @endif
    </div>
</section>
@stop