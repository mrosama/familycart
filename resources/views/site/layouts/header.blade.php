<header>
    <div class="header-nav">
        <div class="head-links">
            <div class="container">
                <ul class="list-unstyled">
                    @if(Auth::user())
                    <li><a href="{{URL::to('logout')}}">{{trans('lang.logout')}} <i class="fa fa-key"></i></a></li>
                    <li><a href="{{URL::to($lang.'/profile/myOrder')}}">{{trans('lang.track_order')}} <i class="fa fa-thumb-tack"></i></a></li>
                    <li><a href="{{URL::to('/').'/'.$lang.'/supports'}}">{{trans('lang.support')}} <i class="fa fa-life-bouy"></i></a></li>
                    <li><a href="{{URL::to('/').'/'.$lang.'/profile/edit'}}">{{trans('lang.profile')}} <i class="fa fa-user "></i></a></li>
                    @if(Auth::user()->type == 'admin')
                    <li><a href="{{URL::to('/admin/home')}}">{{trans('lang.dashboard')}}</a></li>
                    @endif
                    <li>
                        @if($lang == 'en')
                        <a href="{{URL::to('lang/ar?url='.Request::path())}}">  <i class="fa fa-globe "></i> عربي </a>
                        @else
                        <a href="{{URL::to('/lang/en?url='.Request::path())}}">   English <i class="fa fa-globe "></i></a>
                        @endif
                    </li>
                    @else
                    <li><a href="{{URL::to('/').'/'.$lang.'/supports'}}"> {{trans('lang.support')}} <i class="fa fa-life-bouy"></i></a></li>
                    <li><a href="{{URL::to('/').'/'.$lang.'/login'}}"> {{trans('lang.login')}} <i class="fa fa-user "></i></a></li>
                    <li>
                        @if($lang == 'en')
                        <a href="{{URL::to('lang/ar?url='.Request::path())}}">  <i class="fa fa-globe "></i> عربي </a>
                        @else
                        <a href="{{URL::to('/lang/en?url='.Request::path())}}">   English <i class="fa fa-globe "></i></a>
                        @endif
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12 pull-right">
                    <?php $siteName = \App\Setting::find(1)->site_name; ?>
                    <a href="{{URL::to('/').'/'.$lang}}" title="{{$siteName}}"><img src="{{url::to('/images/settings/'.\App\Setting::first()->logo)}}" alt="{{$siteName}}" title="{{$siteName}}"  class="img-responsive"></a>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="search-basket">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="dropdown count-basket dir-rtl" id="cart">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <div class="bas-bas">
                                            <span class="count-no" id="cart_no">{{Cart::count()}}</span> <i class="fa fa-shopping-cart fa-3x"></i>
                                        </div>
                                        <div class="count-bas-txt">
                                            <p class="bas-txt">{{trans('lang.shopping_cart')}}</p>
                                            <p class="bas-co" id="cart_count">{{Cart::count()}} {{trans('lang.products')}}</p>
                                        </div>
                                    </a>
                                    @if(Cart::count() > 0)
                                    <ul class="dropdown-menu" id="getShoppingContent">
                                        <li>
                                            <div class="total-bask-head">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 text-left"><strong>{{Cart::subtotal()}} {{trans('lang.SR')}} </strong></div>
                                                    <div class="col-md-6 col-xs-6"> {{trans('lang.total')}}:</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="total-bask-cont">
                                                <ul>
                                                    @foreach(Cart::content() as $row)
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-3 pull-right">
                                                                <a href="{{URL::to('/'.$lang.'/product/'.$row->id)}}">
                                                                    <img src="{{URL::to('/').'/images/products/'.$row->options->image}}" alt="{{$row->name}}" class="bask-img">
                                                                </a>
                                                            </div>
                                                            <div class="col-md-9 col-xs-9">
                                                                <a href="{{URL::to('/'.$lang.'/product/'.$row->id)}}" class="bask-item-desc-a">
                                                                    @if($lang == 'en')
                                                                    {{$row->options->name_en}}
                                                                    @else
                                                                    {{$row->name , 22}}
                                                                    @endif
                                                                </a>
                                                                <div class="row bask-meas">
                                                                    <div class="col-xs-4 pull-right text-muted">القياس</div>
                                                                    <div class="col-xs-8 text-left"><strong>os</strong></div>
                                                                </div>
                                                                <div class="row bask-pric">
                                                                    <div class="col-xs-4 pull-right text-muted">{{trans('lang.price')}}</div>
                                                                    <div class="col-xs-8 text-left">
                                                                        <p class="orange-price">{{$row->price}}{{trans('lang.SR')}}</p>
                                                                        @if($row->options->original_price)<p class="muted-price">{{$row->options->original_price}}{{trans('lang.SR')}}</p>@endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                        </li>
                                        <hr/>
                                        <div class="finish-list-a">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6"><a href="{{URL::to('/'.$lang.'/shipping')}}" class="bask-link-orange"><i class="fa fa-credit-card"></i> {{trans('lang.pay_now')}} </a></div>
                                                <div class="col-md-6 col-xs-6"><a href="{{URL::to('/'.$lang.'/cart')}}" class="bask-link-gray"><i class="fa fa-shopping-cart"></i> {{trans('lang.view_cart')}}</a></div>
                                            </div>
                                        </div>
                                    </ul>
                                    @endif
                                </div> 
                            </div>
                            <div class="col-md-7 col-md-offset-1 col-sm-8">
                                {{Form::open(array('url' => 'search' , 'method' => 'GET'))}}
                                <div class="search">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-search" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
                                        </span>
                                        <input type="text" name="q" class="form-control dir-rtl" placeholder="{{trans('lang.searchingFor')}}">
                                    </div><!-- /input-group -->
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" onclick="openNav()">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Get All Sections -->
                    <?php $sections = App\Section::where('status', 1)->get();
                    ?>
                    <!-- End All Section -->
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav dir-rtl">
                            <li class="active">
                                @if($lang == 'en')
                                <a href="{{URL::to('/en')}}">
                                    {{trans('lang.home')}}
                                </a>
                                @else
                                <a href="{{URL::to('/')}}">
                                    {{trans('lang.home')}}
                                </a>
                                @endif
                            </li>
                            @foreach($sections as $section)          
                            <li class="dropdown mega-dropdown">
                                <?php
                                $section_url = str_replace(' ', '-', $section->name_en);
                                $section_url = preg_replace('/[^A-Za-z0-9\-]/', '', $section_url);
                                ?>
                                <a href="{{URL::to($lang.'/section' , [$section->id , $section_url])}}" class="dropdown-toggle" > 
                                    @if($lang == 'en')
                                    <?php $section_name = $section->name_en; ?>
                                    @else
                                    <?php $section_name = $section->name_ar; ?>
                                    @endif
                                    <!-- remove any spaces and special chars -->
                                    {{$section_name}}
                                      <!--<span class="glyphicon glyphicon-chevron-down pull-left"></span>-->    
                                </a>
                                <ul class="dropdown-menu mega-dropdown-menu row">
                                    @if(!empty($section->image))
                                    <li class="col-sm-3">
                                        <ul>
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <a href="#"><img src="{{URL::to('/').'/images/sections/'.$section->image}}" class="img-responsive" alt="{{$section_name}}"></a>
                                                    </div>
                                                </div> 
                                            </div>
                                        </ul>
                                    </li>
                                    @endif
                                    <!-- Get Third Two Branch Related With Section -->
                                    <?php $branches = App\Branch::where('section_id', $section->id)->skip(4)->take(2)->get(); ?>
                                    <!-- End  Third Two Branch Related With Section -->
                                    <li class="col-sm-3">
                                        <ul>
                                            @foreach($branches as $branch)
                                            <li class="dropdown-header">
                                                @if($lang == 'en')
                                                {{$branch->name_en}}
                                                @else
                                                {{$branch->name_ar}}
                                                @endif
                                            </li>
                                            <?php $types = App\Type::where('branch_id', $branch->id)->get(); ?>
                                            @foreach($types as $type)
                                            <li>
                                                <a href="{{URL::to($lang.'/type') . '/' . $type->id}}">
                                                    @if($lang == 'en')
                                                    {{$type->name_en}}
                                                    @else
                                                    {{$type->name_ar}}
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                            <!--                                            <li class="divider"></li>-->
                                            <br>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- Get Second Two Branch Related With Section -->
                                    <?php $branches = App\Branch::where('section_id', $section->id)->skip(2)->take(2)->get(); ?>
                                    <!-- End  Second Two Branch Related With Section -->
                                    <li class="col-sm-3">
                                        <ul>
                                            @foreach($branches as $branch)
                                            <li class="dropdown-header">
                                                @if($lang == 'en')
                                                {{$branch->name_en}}
                                                @else
                                                {{$branch->name_ar}}
                                                @endif
                                            </li>
                                            <?php $types = App\Type::where('branch_id', $branch->id)->get(); ?>
                                            @foreach($types as $type)
                                            <li>
                                                <a href="{{URL::to($lang.'/type') . '/' . $type->id}}">
                                                    @if($lang == 'en')
                                                    {{$type->name_en}}
                                                    @else
                                                    {{$type->name_ar}}
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                            <!--                                            <li class="divider"></li>-->
                                            <br>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- Get First Two Branch Related With Section -->
                                    <?php //$branches = App\Branch::where('section_id', $section->id)->get(); ?>
                                    <?php $branches = App\Branch::where('section_id', $section->id)->take(2)->get(); ?>
                                    <!-- End  First Two Branch Related With Section -->
                                    <li class="col-sm-3">
                                        <ul>
                                            @foreach($branches as $branch)
                                            <li class="dropdown-header">
                                                @if($lang == 'en')
                                                {{$branch->name_en}}
                                                @else
                                                {{$branch->name_ar}}
                                                @endif
                                            </li>
                                            <?php $types = App\Type::where('branch_id', $branch->id)->get(); ?>
                                            @foreach($types as $type)
                                            <li>
                                                <a href="{{URL::to($lang.'/type') . '/' . $type->id}}">
                                                    @if($lang == 'en')
                                                    {{$type->name_en}}
                                                    @else
                                                    {{$type->name_ar}}
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                            <!--                                            <li class="divider"></li>-->
                                            <br>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>

                            </li>
                            @endforeach
                            <li><a href="{{URL::to('/').'/'.$lang.'/offers'}}">{{trans('lang.last_offers')}}</a></li>
                            <li><a href="{{URL::to('/').'/'.$lang.'/all_categories'}}">{{trans('lang.all_categories')}}</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!--
                          <div id="mySidenav" class="sidenav">
                              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                              <a href="#">About</a>
                              <a href="#">Services</a>
                              <a href="#">Clients</a>
                              <a href="#">Contact</a>
                            </div>
        -->

    </div>
</header>

<section id="main-content">