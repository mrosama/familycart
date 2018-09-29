@extends('site.layouts.master')
@section('content')

<section id="main-basket" class="dir-rtl">
    <div class="container text-center">
        <h2>{{trans('lang.product_notFound')}}</h2>
        <br>
        <h4><a href="{{URL::to('/'.$lang)}}"> {{trans('lang.back_to_home')}} </a></h4>
        <br>

    </div>
</section>

@stop