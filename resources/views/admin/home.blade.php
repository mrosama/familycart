@extends('admin.layouts.master')
@section('title')
الصفحة الرئيسية
@stop
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>الرئيسية
                    <small>الرئيسية & الاحصائيات</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->

            <!-- END PAGE TOOLBAR -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Section::get()->count()}}"> {{App\Section::get()->count()}}</span>
                        </div>
                        <div class="desc">  الاقسام الرئيسية </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/sections')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Branch::get()->count()}}">{{App\Branch::get()->count()}}</span>
                        </div>
                        <div class="desc">  الاقسام الفرعية </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/branches')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dark">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Type::get()->count()}}">{{App\Type::get()->count()}}</span>
                        </div>
                        <div class="desc">  الاقسام الداخلية </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/types')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Brand::get()->count()}}">{{App\Brand::get()->count()}}</span>
                        </div>
                        <div class="desc">  الماركات  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/brands')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Product::get()->count()}}">{{App\Product::get()->count()}}</span>
                        </div>
                        <div class="desc">  المنتجات  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/products')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Seller::get()->count()}}">{{App\Seller::get()->count()}}</span>
                        </div>
                        <div class="desc">  البائعين  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/sellers')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Country::get()->count()}}">{{App\Country::get()->count()}}</span>
                        </div>
                        <div class="desc">  الدول  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/countries')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\City::get()->count()}}">{{App\City::get()->count()}}</span>
                        </div>
                        <div class="desc">  المدن  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/cities')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\Order::get()->count()}}">{{App\Order::get()->count()}}</span>
                        </div>
                        <div class="desc">  الطلبات  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/orders')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{App\User::get()->count()}}">{{App\User::get()->count()}}</span>
                        </div>
                        <div class="desc">  المستخدمين  </div>
                    </div>
                    <a class="more" href="{{URL::to('admin/users')}}"> عرض الكل
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->

    </div>
</div>

<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@stop