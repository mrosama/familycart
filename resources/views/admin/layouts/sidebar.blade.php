<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start ">
                    <a href="{{URL::to('/')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">الذهاب للموقع</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item start active open">
                    <a href="{{URL::to('/admin/home')}}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">الرئيسية</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">اقسام الموقع الرئيسية</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sections/create')}}" class="nav-link ">
                                <span class="title">اضافة قسم جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sections')}}" class="nav-link ">
                                <span class="title">عرض الاقسام</span>
                                <span class="badge badge-danger">{{App\Section::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title"> اقسام الموقع الفرعية</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/branches/create')}}" class="nav-link ">
                                <span class="title">اضافة قسم جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/branches')}}" class="nav-link ">
                                <span class="title">عرض الاقسام</span>
                                <span class="badge badge-danger">{{App\Branch::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">    الاقسام الداخلية</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/types/create')}}" class="nav-link ">
                                <span class="title">اضافة قسم جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/types')}}" class="nav-link ">
                                <span class="title">عرض الاقسام</span>
                                <span class="badge badge-danger">{{App\Type::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">   الماركات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/brands/create')}}" class="nav-link ">
                                <span class="title">اضافة ماركة جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/brands')}}" class="nav-link ">
                                <span class="title">عرض الماركات</span>
                                <span class="badge badge-danger">{{App\Brand::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">   المنتجات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/products/create')}}" class="nav-link ">
                                <span class="title">اضافة منتج جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/products')}}" class="nav-link ">
                                <span class="title">عرض المنتجات</span>
                                <span class="badge badge-danger">{{App\Product::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">   البائعين</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sellers/create')}}" class="nav-link ">
                                <span class="title">اضافة بائع جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sellers')}}" class="nav-link ">
                                <span class="title">عرض البائعين</span>
                                <span class="badge badge-danger">{{App\Seller::count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">  العروض</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/offers/create')}}" class="nav-link ">
                                <span class="title">اضافة  </span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/offers')}}" class="nav-link ">
                                <span class="title">عرض  </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title"> الخصائص والمواصفات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/features/create')}}" class="nav-link ">
                                <span class="title">اضافة  </span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/features')}}" class="nav-link ">
                                <span class="title">عرض  </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">الالوان المتاحة</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/colors/create')}}" class="nav-link ">
                                <span class="title">اضافة لون جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/colors')}}" class="nav-link ">
                                <span class="title">عرض الالوان المتاحة</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">الاحجام المتاحة</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sizes/create')}}" class="nav-link ">
                                <span class="title">اضافة حجم جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sizes')}}" class="nav-link ">
                                <span class="title">عرض الاحجام المتاحة</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">الدول</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/countries/create')}}" class="nav-link ">
                                <span class="title">اضافة دولة جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/countries')}}" class="nav-link ">
                                <span class="title">عرض الدول</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">المدن والشحن</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/cities/create')}}" class="nav-link ">
                                <span class="title">اضافة مدينة جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/cities')}}" class="nav-link ">
                                <span class="title">عرض المدن</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">المستخدمين</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/users/create')}}" class="nav-link ">
                                <span class="title">اضافة مستخدم جديد</span>
                            </a>
                        </li>
                        <!--                        <li class="nav-item  ">
                                                    <a href="{{URL::to('/admin/users')}}" class="nav-link ">
                                                        <span class="title">عرض المستخدمين</span>
                                                        <span class="badge badge-danger">2</span>
                                                    </a>
                                                </li>-->
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/users/type/user')}}" class="nav-link ">
                                <span class="title">العملاء</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/users/type/admin')}}" class="nav-link ">
                                <span class="title">الادارة</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">  الصفحات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/pages/create')}}" class="nav-link nav-toggle">
                                <span class="title">  اضافة صفحة جديدة</span>

                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/pages')}}" class="nav-link nav-toggle">
                                <span class="title">  عرض الصفحات</span>
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">  البنرات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sliders/create')}}" class="nav-link nav-toggle">
                                <span class="title">  اضافة بنر جديد</span>

                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/sliders')}}" class="nav-link nav-toggle">
                                <span class="title">  عرض البنرات</span>
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">  اعلانات الرئيسية</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <!--                        <li class="nav-item  ">
                                                    <a href="{{URL::to('/admin/ads/create')}}" class="nav-link nav-toggle">
                                                        <span class="title"> اضافة اعلان جديد</span>
                        
                                                    </a>
                                                </li>-->
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/ads')}}" class="nav-link nav-toggle">
                                <span class="title">  عرض الاعلانات</span>
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title"> الدعم</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/supports/create')}}" class="nav-link ">
                                <span class="title">اضافة قسم جديد</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{URL::to('/admin/supports')}}" class="nav-link ">
                                <span class="title">عرض  اقسام الدعم</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="{{URL::to('admin/orders')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title"> الطلبات</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{URL::to('admin/productReturn')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title"> المنتجات المطلوب ارجاعها</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{URL::to('admin/best_offers')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title"> صور اخر العروض</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{URL::to('admin/ads_offers')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">اعلانات صفحة العروض</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{URL::to('admin/settings')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">اعدادات الموقع</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{URL::to('admin/newsletters')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title"> القائمة البريدية</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{URL::to('admin/contacts')}}" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">  رسائل اتصل بنا  </span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->