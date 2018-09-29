<!--====================================== Get Products ID  ======================================-->
<?php $productIDs = App\Product::where('section_id', $section->id)->select('id')->get(); ?>

<section id="main-search" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 pull-right">
                <a id="sidebar-toggle" class="badge visible-xs pull-left"><i class="fa fa-plus fa-lg"></i></a>
                <div>
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">
                            @if($lang == "ar")
                            @if($section){{$section->name_ar}}@endif
                            @else
                            @if($section){{$section->name_en}}@endif
                            @endif
                        </h5>
                        <ul class="sidebar-list">

                            @if(Request::segment(2) == 'type')
                            <?php
                            $branch = App\Branch::find($type->branch_id);
                            $branch_url = str_replace(' ', '-', $branch->name_en);
                            $branch_url = preg_replace('/[^A-Za-z0-9\-]/', '', $branch_url);
                            ?>

                            <li><a href="{{URL::to($lang.'/branch' , [$branch->id , $branch_url])}}"><span class="fa fa-angle-left fa-lg"></span> 
                                    @if($lang == 'en')
                                    {{$branch->name_en}}
                                    @else
                                    {{$branch->name_ar}}
                                    @endif
                                </a></li>
                            @elseif(Request::segment(2) == 'section' || Request::segment(2) == 'branch')
                            @foreach(App\Branch::where('section_id', $section->id)->get() as $branch)
                            <?php
                            $branch_url = str_replace(' ', '-', $branch->name_en);
                            $branch_url = preg_replace('/[^A-Za-z0-9\-]/', '', $branch_url);
                            ?>
                            <li><a href="{{URL::to($lang.'/branch' , [$branch->id , $branch_url])}}"><span class="fa fa-angle-left fa-lg"></span> 
                                    @if($lang == 'en')
                                    {{$branch->name_en}}
                                    @else
                                    {{$branch->name_ar}}
                                    @endif
                                </a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <?php $brand_count = App\Brand::where('section_id', $section->id)->count(); ?>
                    @if($brand_count > 0)
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">{{trans('lang.brand')}}</h5>
                        <div class="sidebar-part-con">
                            <div class="form-group">
                                <div class="form-search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" id="getBrand" placeholder="{{trans('lang.search_brand')}}" class="form-control">
                                </div>
                            </div>
                            <div class="trademarks-list">
                                <ul class="trade-list">
                                    @foreach(App\Brand::where('section_id', $section->id)->get() as $brand)
                                    <li class="{{(in_array($brand->id, $getBrands))? "liBrand select-it" : "liBrand"}}" onclick="SearchByUrl({{$brand->id}} , 'brand')"><a href="#"> 
                                            <?php $brandCount = App\Product::where('brand_id', $brand->id)->count(); ?>
                                            @if($brandCount > 0)
                                            @if($lang == 'en')
                                            {{$brand->name_en}}<span class="badge">{{$brandCount}}</span>
                                            @else
                                            {{$brand->name_ar}}<span class="badge">{{$brandCount}}</span>
                                            @endif
                                            @endif
                                        </a></li>
                                    @endforeach
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <?php $product_count = \App\Product::where('section_id', $section->id)->count(); ?>
                    @if($product_count > 1)
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">{{trans('lang.price')}}</h5>
                        <div class="sidebar-part-con">
                            <div class="example">
                                <div id="skipstep"></div>
                            </div>
                            <div class="price-filter">
                                <?php
                                $large_value = \App\Product::where('section_id', $section->id)->select('discount_price')->orderBy('discount_price', 'desc')->first()->discount_price;
                                $small_value = \App\Product::where('section_id', $section->id)->select('discount_price')->orderBy('discount_price', 'asc')->first()->discount_price;
                                ?>
                                @if(isset($large_value))
                                <input type="hidden" id="large_value" value="{{$large_value}}" />
                                @endif
                                @if(isset($small_value))
                                <input type="hidden" id="small_value" value="{{$small_value}}" />
                                @endif
                                <span class="example-val" id="skip-value-upper" style="display: none;"></span> 
                                 <span class="example-val" id="skip-value-lower" style="display: none;"></span>
                                <div class="row">
                                    <div class="col-md-3"><button type="button" onclick="priceSearch()" class="btn btn-primary btn-sm">{{trans('lang.filter')}}</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!--                    <div class="siderbar-part">
                                            <h5 class="sidebar-hd">{{trans('lang.price')}}</h5>
                                            <div class="sidebar-part-con">
                                                <div class="price-filter">
                                                    <input type="text" id="range" name="example_name" value="" /><br>
                                                    <div class="row">
                                                        <div class="col-md-3"><button type="button" onclick="priceSearch()" class="btn btn-primary btn-sm">{{trans('lang.filter')}}</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->





                    <!--====================================== Get Offers And Offer Count ======================================-->
                    <?php
                    $offerIDs = array();
                    foreach ($productIDs as $row) {
                        $off_id = App\Product_offers::where('product_id', $row->id)->select('offer_id')->first();
                        array_push($offerIDs, $off_id);
                    }
                    if ($offerIDs) {
                        foreach ($offerIDs as $row) {
                            if ($row) {
                                $offer_id[] = $row->offer_id;
                            }
                        }
                        if (isset($offer_id))
                            $offer_IDs = array_count_values($offer_id);
                    }
                    ?>
                    @if(isset($offer_IDs))
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">{{trans('lang.offers')}}</h5>
                        <div class="sidebar-part-con">
                            <div class="price-filter-list">
                                <ul class="trade-list">
                                    @foreach($offer_IDs as $key => $val)
                                    <li class="{{(in_array($key , $getOffers))? "liBrand select-it" : "liBrand"}}" onclick="SearchByUrl({{$key}} , 'offer')">
                                        @if($lang == 'ar')
                                        <a href="#">{{App\Offer::find($key)->name_ar}}
                                            @else
                                            <a href="#">{{App\Offer::find($key)->name_en}}
                                                @endif
                                                <span class="badge">{{$val}}</span></a></li>
                                    @endforeach
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endif


                    <!--====================================== Get Colors And Color Count ======================================-->
                    <?php
                    $colorIDs = array();
                    foreach ($productIDs as $row) {
                        $color_id = App\Product::where('id', $row->id)->select('color_id')->first();
                        array_push($colorIDs, $color_id);
                    }
                    if (isset($colorIDs)) {
                        foreach ($colorIDs as $row) {
                            if ($row->color_id != 0) {
                                $colors_id[] = $row->color_id;
                            }
                        }
                        if (isset($colors_id))
                            $color_IDs = array_count_values($colors_id);
                    }
                    ?>
                    @if(isset($color_IDs))
                    <div class="siderbar-part">
                        <h5 class="sidebar-hd">{{trans('lang.colors')}}</h5>
                        <div class="sidebar-part-con">
                            <div class="price-filter-list">
                                <ul class="trade-list">
                                    @foreach($color_IDs as $key => $val)
                                    <li class="{{(in_array($key , $getColors))? "liBrand select-it" : "liBrand"}}" onclick="SearchByUrl({{$key}} , 'color')">
                                        @if($lang == 'ar')
                                        <a href="#">{{App\Color::find($key)->name_ar}}
                                            @else
                                            <a href="#">{{App\Color::find($key)->name_en}}
                                                @endif
                                                <span class="badge">{{$val}}</span></a></li>
                                    @endforeach
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--                    <div class="siderbar-part">
                                            <h5 class="sidebar-hd">{{trans('lang.colors')}}</h5>
                                            <div class="sidebar-part-con">
                                                <div class="trademarks-list">
                                                    <ul class="trade-list">
                                                        @foreach($colors_arr as $color)
                                                        @if(App\Color::find($color) != null)
                                                        <li class="{{(in_array($color, $getColors))? "liBrand select-it" : "liBrand"}}" onclick="SearchByUrl({{$color}} , 'color')">
                                                            @if($lang == 'ar')
                                                            <a href="#">{{App\Color::find($color)->name_ar}}
                                                                @else
                                                                <a href="#">{{App\Color::find($color)->name_en}}
                                                                    @endif
                                                                    <span class="badge">{{App\Product::where('color_id' , $color)->count()}}</span></a></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>-->


                    <!-- available -->
                    <!--                    
                                        <div class="siderbar-part">
                                            <h5 class="sidebar-hd">{{trans('lang.available')}}</h5>
                                            <div class="sidebar-part-con">
                                                <div class="available-txt">
                                                    <input type="checkbox" id="available-sel">{{trans('lang.out_stock')}}
                                                </div>
                                            </div>
                                        </div>
                    -->


                </div>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-9 col-sm-9">
                <div class="login-part">
                    <div>
                        <div class="search-results">
                            <p class="pull-right"><b> {{trans('lang.results')}} </b> {{count($products)}}</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="search-results">
                            <div class="search-arrange">
                                <h6 class="pull-right"><strong> {{trans('lang.arrangement')}} </strong></h6> &nbsp; &nbsp;
                                <form action="#" class="search-by">
                                    <div class="form-group">
                                        @if($lang == 'en')
                                        {{Form::select('search-arrange-by' , ['mShares'=>'most popular' , 'newest'=>'newest' , 'lPrice'=>'low price' , 'hPrice'=>'high price' , 'discounts'=>'discount'] , $getarrange , ['class'=>'form-control' , 'onchange'=>"changeSearch(this.value)" , 'id'=>'search-arrange-by'])}}
                                        @else
                                        {{Form::select('search-arrange-by' , ['mShares'=>'الأكثر شهرة' , 'newest'=>'الجديد' , 'lPrice'=>'السعر الأقل' , 'hPrice'=>'السعر الأعلى' , 'discounts'=>'تخفيضات'] , $getarrange , ['class'=>'form-control' , 'onchange'=>"changeSearch(this.value)" , 'id'=>'search-arrange-by'])}}
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="search-arrange hidden-xs">
                                <h6 class="pull-right"><strong>{{trans('lang.view')}}</strong></h6>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" id="row-view"><i class="fa fa-bars"></i></button>
                                            <button type="button" class="btn btn-default" id="grid-view"><i class="fa fa-th"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @section('js')
                    <script>
                        var skipSlider = document.getElementById('skipstep');
                        var small_value = parseInt($('#small_value').val());
                        var large_value = parseInt($('#large_value').val());
                        if (isNaN(small_value)) small_value = 0;
                        if (isNaN(large_value)) large_value = 99999;
                        skipSlider.style.height = '10px';
                        skipSlider.style.margin = '0 auto 30px';
                        noUiSlider.create(skipSlider, {
                        range: {
                        'min': small_value,
                                'max': large_value
                        },
                                start: [small_value, large_value],
                                connect: true,
                                step: 1,
                                tooltips: true,

                        });
                        var skipValues = [
                                document.getElementById('skip-value-lower'),
                                document.getElementById('skip-value-upper')
                        ];
                        skipSlider.noUiSlider.on('update', function(values, handle) {
                        skipValues[handle].innerHTML = values[handle];
                        });
                        $('#getBrand').keyup(function(event) {
                        var word = $(this).val();
                        $.each($('li.liBrand').children('a'), function(index, val)
                        {
                        console.log($(this).parent());
                        if ($(this).text().toLowerCase().search(word.toLowerCase()) != - 1)
                                $(this).parent().show();
                        else
                                $(this).parent().hide();
                        });
                        });
                        var arrayFromPHP = <?php echo json_encode($restUrl); ?>;
                        var arr = "";
                        var S_char = "&";
                        function SearchByUrl(type_id, type) {
                        if (type == "brand")
                        {
                        var types = "{{json_encode($getBrands)}}";
                        var types = JSON.parse(types.replace(/&quot;/g, ''));
                        }
                        else if (type == "color")
                        {
                        var types = "{{json_encode($getColors)}}";
                        var types = JSON.parse(types.replace(/&quot;/g, ''));
                        }
                        else if (type == "offer")
                        {
                        var types = "{{json_encode($getOffers)}}";
                        var types = JSON.parse(types.replace(/&quot;/g, ''));
                        }

                        if ($.inArray(type_id, types) == - 1)
                        {
                        types.push(type_id);
                        arr += type + "=" + types;
                        }
                        else
                        {
                        types.splice($.inArray(type_id, types), 1);
                        if (types.length == 0)
                                arr = [];
                        else
                                arr += type + "=" + types;
                        }

                        if (types.length == 0)
                                S_char = "";
                        $.each(arrayFromPHP, function (i, elem) {
                        if (i != type)
                                arr += S_char + i + "=" + elem + "&";
                        });
                        if (arr.substr( - 1) == "&")
                                arr = arr.slice(0, - 1);
                        window.location.replace("{{Request::url()}}?" + arr);
                        }

                        function changeSearch(value) {
                        arr += "arrange" + "=" + value;
                        $.each(arrayFromPHP, function (i, elem) {
                        if (i != "arrange")
                                arr += S_char + i + "=" + elem + "&";
                        });
                        if (arr.substr( - 1) == "&")
                                arr = arr.slice(0, - 1);
                        window.location.replace("{{Request::url()}}?" + arr);
                        }

//                        function priceSearch() {
//                        var range = $('#range').val();
//                        var range = range.split(";");
//                        var min = range[0];
//                        var max = range[1];
//                        arr += "price" + "=" + min + "," + max;
//                        $.each(arrayFromPHP, function (i, elem) {
//                        if (i != "price")
//                                arr += S_char + i + "=" + elem + "&";
//                        });
//                        if (arr.substr( - 1) == "&")
//                                arr = arr.slice(0, - 1);
//                        window.location.replace("{{Request::url()}}?" + arr);
//                        }



                        function priceSearch() {
                        var min = $('#skip-value-lower').text();
                        var max = $('#skip-value-upper').text();
                        arr += "price" + "=" + min + "," + max;
                        console.log(min);
                        console.log(max);
                        console.log(arr);
                        $.each(arrayFromPHP, function (i, elem) {
                        if (i != "price")
                                arr += S_char + i + "=" + elem + "&";
                        });
                        if (arr.substr( - 1) == "&")
                                arr = arr.slice(0, - 1);
                        window.location.replace("{{Request::url()}}?" + arr);
                        }

                    </script>
                    @stop