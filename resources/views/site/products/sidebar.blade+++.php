<section id="main-search" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 pull-right">
                <a id="sidebar-toggle" class="badge visible-xs pull-left"><i class="fa fa-plus fa-lg"></i></a>
                <div class="side-toggle">
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">
                            @if($lang == 'en')
                            {{$section->name_en}}
                            @else
                            {{$section->name_ar}}
                            @endif
                        </h5>
                        <ul class="sidebar-list">
                            @foreach($branches as $branch)
                            <?php $section_name = trim(str_replace(' ', '_', $section->name_en)); ?>
                            @if($lang == 'en')
                            <li><a href="{{URL::to('/en/section/'.$section->id. '/'. $section_name .'?branchID=' . $branch->id)}}"><span class="fa fa-angle-left fa-lg"></span> {{$branch->name_en}}</a></li>
                            @else
                            <li><a href="{{URL::to('/ar/section/'.$section->id. '/'. $section_name.'?branchID=' . $branch->id)}}"><span class="fa fa-angle-left fa-lg"></span> {{$branch->name_ar}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">الماركة</h5>
                        <div class="sidebar-part-con">
                            <form action="#">
                                <div class="form-group">
                                    <div class="form-search">
                                        <i class="fa fa-search"></i>
                                        <input type="text" placeholder="إبحث الماركة" class="form-control">
                                    </div>
                                </div>
                            </form>
                            <div class="trademarks-list">
                                <ul class="trade-list">
                                    @foreach($brands as $brand)
                                    <!-- get product count based on brand and section-->
                                    <?php $productBrandCount = \App\Product::where(['section_id' => $section->id, 'brand_id' => $brand->id])->count(); ?>
                                    <?php
//                   
//                                    if (isset($_GET['brandID'])) {
//                                      //  $brandIDs = array_add($_GET['brandID']);
////                                        if (!in_array($_GET['brandID'], $brandIDs))
////                                            array_push($brandIDs, $_GET['brandID']);
//                                    }
//                                    dd( $_SESSION['brandIDs']);
//                                    $data = array('brandIDs' => $brandIDs, 'section_id' => $section->id);
//                                    $query = http_build_query($data);
                                    ?>
                                    @if($lang == 'en' && $productBrandCount > 0)
                                    @if($productBrandCount > 0)
                                    <li><a href="{{URL::to('/ar/section/'.$section->id. '/'. $section_name.'?brandID=' .$brand->id)}}">{{$brand->name_en}} <span class="badge">{{$productBrandCount}}</span></a></li>
                                    @endif
                                    @else
                                    @if($productBrandCount > 0)
                                    <li><a href="{{URL::to('/ar/section/'.$section->id. '/'. $section_name.'?brandID=' .$brand->id)}}">{{$brand->name_ar}} <span class="badge">{{$productBrandCount}}</span></a></li>
                                    @endif
                                    @endif
                                    @endforeach
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">السعر</h5>
                        <div class="sidebar-part-con">
                            <div id="h-slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
                            <div class="price-filter">
                                <div class="row">
                                    <div class="col-md-9">من 100 - إلى 200 ريال</div>
                                    <div class="col-md-3"><button type="submit" class="btn btn-primary btn-sm">التصفية</button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">العروض</h5>
                        <div class="sidebar-part-con">
                            <div class="price-filter-list">
                                <ul class="trade-list">
                                    <li><a href="#">أفضل سعر <span class="badge">35</span></a></li>
                                    <li><a href="#">إنخفاض الأسعار <span class="badge">355</span></a></li>
                                    <li><a href="#">أفضل سعر <span class="badge">50</span></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">اللون</h5>
                        <div class="sidebar-part-con">
                            <div class="trademarks-list">
                                <ul class="trade-list">
                                    <li><a href="#">أبيض <span class="badge">35</span></a></li>
                                    <li><a href="#">أحمر <span class="badge">355</span></a></li>
                                    <li><a href="#">أصفر <span class="badge">50</span></a></li>
                                    <li><a href="#">أزرق <span class="badge">100</span></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">المتاح</h5>
                        <div class="sidebar-part-con">
                            <div class="available-txt">
                                <input type="checkbox" id="available-sel">يشمل المنتجات الغير متوفرة حاليا
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-xs"></div>