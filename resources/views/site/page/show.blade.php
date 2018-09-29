@extends('site.layouts.master')
@section('content')
<h2 style="text-align: center;">
    @if($lang == 'en')
    {{$page->title_en}}
    @else
    {{$page->title}}
    @endif
</h2>
<hr>
<p style="text-align: center; margin: 20px;">
    @if($lang == 'en')
    {{$page->desc_en}}
    @else
    {{$page->desc}}
    @endif
</p>
@stop