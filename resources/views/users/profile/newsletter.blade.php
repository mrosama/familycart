@extends('site.layouts.master')
@section('content')
@include('users.profile.sidebar')

<div class="clearfix visible-xs"></div>
<div class="col-md-10 col-sm-9">
    <div class="login-part">
        <div class="login-header">
            <h3 class="login-hd"><i class="fa fa-book"></i> {{trans('lang.subscriptions')}}
            </h3>
        </div>
        <div class="login-header">
            <!-- flash message data -->
            @if (Session::has('success')) 
            <div class="alert alert-success"  style="text-align: right;">{{Session::get('success')}}</div>
            @endif
            <h5 class="login-hd"> {{trans('lang.general_newsletter')}}</h5>
            <ul class="feature-list" style="list-style: none;">
                <li><i class="fa fa-star"></i> {{trans('lang.flash_sales')}}</li>
                <li><i class="fa fa-star"></i> {{trans('lang.special_offers')}}</li>
                <li><i class="fa fa-star"></i> {{trans('lang.exclusive_products')}}</li>
                <li><i class="fa fa-star"></i> {{trans('lang.new_launches')}}</li>
            </ul>
        </div>
        <div class="user-prof-con" style="margin: 15px;">
            {{Form::open(array('url' => ['profile/newsletter/update'] , 'method' => 'post' , 'class' => 'form-horizontal user-profile-form'))}}
            <div>
                @if($email_exist == null)
                <input type="checkbox" name="subscribe"  value="1">
                @else
                <input type="checkbox" name="subscribe" checked=""  value="1">
                @endif
                {{trans('lang.newsletter_subscribe')}}
            </div>	
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input type="submit" class="btn btn-success btn-block" value="{{trans('lang.ok')}}">
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
</div>
</div> 
</section>

@stop