@extends('site.layouts.master')
@section('content')

<section id="main-basket" class="dir-rtl">
    <div class="container text-center">
        <h2>{{trans('lang.purchase_success')}}</h2>
        <br>
        <h4><a href="{{URL::to('/'.$lang)}}"> {{trans('lang.back_to_home')}}  <i class="fa fa-home"></i></a></h4>
        <br>
        
    </div>
</section>

@stop