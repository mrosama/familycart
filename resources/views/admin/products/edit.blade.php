@extends('admin.layouts.master')
@section('title')
تعديل بيانات  منتج
@stop
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height:1535px">
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{URL::to('/admin/home')}}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">  تعديل بيانات  منتج</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">  تعديل بيانات  منتج</span>
                        </div>
                        <div class="actions">
                            <a href="{{URL::to('/admin/products')}}" class="btn btn-primary">عرض جميع المنتجات</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['route' => ['admin.products.update' , $product->id] , 'class' => 'form-horizontal' , 'method' => 'PUT' ,  'files' => 'TRUE'])}}
                        <div class="form-body">

                            <!-- Flash Message -->
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            <!-- End Flash Message -->

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم القسم الرئيسي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('section_id' ,$sections , $product->section_id , ['class' => 'form-control' , 'placeholder' => 'اختر القسم الرئيسي' , 'id' => 'section_id'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم القسم الفرعي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <!--                                    {{Form::select('branch_id' ,$branches,  $product->branch_id , ['class' => 'form-control' , 'id' => 'branch_id'])}}-->

                                    @if(count($branches) > 0)
                                    {{Form::select('branch_id' , $branches  , $product->branch_id , ['class' => 'form-control' , 'id' => 'branch_id'])}}
                                    @else
                                    {{Form::select('branch_id' , ['' => ' اختر القسم الرئيسي اولا ']   , '' , ['class' => 'form-control' , 'id' => 'branch_id'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  نوع الفرع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    @if(count($types) > 0)
                                    {{Form::select('type_id' , $types  , $product->type_id , ['class' => 'form-control' , 'id' => 'type_id'])}}
                                    @else
                                    {{Form::select('type_id' , ['' => 'اختر  الفرعي  او النوع اولا']   , '' , ['class' => 'form-control' , 'id' => 'type_id'])}}
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  الماركة
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <!--                                    {{Form::select('brand_id' ,['' => 'اختر  الفرعي  او النوع اولا'] , '' , ['class' => 'form-control' , 'id' => 'brand_id'])}}-->
                                    @if(count($brands) > 0)
                                    {{Form::select('brand_id' , $brands  , $product->brand_id , ['class' => 'form-control' , 'id' => 'brand_id'])}}
                                    @else
                                    {{Form::select('brand_id' , ['' => 'اختر  الفرعي  او النوع اولا']    , '' , ['class' => 'form-control' , 'id' => 'brand_id'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  البائع
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('seller_id' , $sellers , $product->seller_id , ['class' => 'form-control' , 'placeholder' => 'اختر اسم البائع'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم  المنتج
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_ar' ,$product->name_ar , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Product Name
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('name_en' ,$product->name_en , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">السعر الاصلي
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('original_price' , $product->original_price , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">السعر بعد الخصم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('discount_price' , $product->discount_price , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3"> الكمية 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::number('quantity'  , $product->quantity  , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3">  مدة الشحن
                                    <span class="required" aria-required="true"> * (باليوم)</span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('duration_charging' ,$product->duration_charging , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">  مدة التسليم
                                    <span class="required" aria-required="true"> * (باليوم)</span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('duration_delivery' , $product->duration_delivery , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> الضمان
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('guarantee' , $product->guarantee , ['class' => 'form-control'])}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3">  الدفع عند الاستلام
                                </label>
                                <div class="col-md-6">
                                    @if($product->payment_on_delivery == 1)
                                    نعم {{Form::radio('payment_on_delivery' ,'1' , ['checked'])}}
                                    لا{{Form::radio('payment_on_delivery' ,'0' )}}
                                    @else($product->payment_on_delivery == 0)
                                    نعم {{Form::radio('payment_on_delivery' ,'1')}}
                                    لا{{Form::radio('payment_on_delivery' ,'0' , ['checked'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> تغليف الهدايا
                                </label>
                                <div class="col-md-6">
                                    @if($product->gift_wrapping == 1)
                                    نعم {{Form::radio('gift_wrapping' ,'1' , ['checked'])}}
                                    لا{{Form::radio('gift_wrapping' ,'0' )}}
                                    @else($product->gift_wrapping == 0)
                                    نعم {{Form::radio('gift_wrapping' ,'1')}}
                                    لا{{Form::radio('gift_wrapping' ,'0' , ['checked'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">  شحن مجاني
                                </label>
                                <div class="col-md-6">
                                    @if($product->free_charge == 1)
                                    نعم {{Form::radio('free_charge' ,'1' , ['checked'])}}
                                    لا{{Form::radio('free_charge' ,'0' )}}
                                    @else($product->free_charge == 0)
                                    نعم {{Form::radio('free_charge' ,'1')}}
                                    لا{{Form::radio('free_charge' ,'0' , ['checked'])}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> اللون الاساسي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('color_id' ,$colors, $product->color_id , ['class' => 'form-control' , 'placeholder' => 'اختر اللون'])}}
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <button class="btn btn-primary" type="button" id="more_colors">اضف المزيد من الالوان</button>
                                                                </div>-->
                            </div>

                            <!--                            <div id="more_colors_place"></div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">  الالوان الاضافية
                                                            </label>
                                                        </div>
                                                        <div id="extra_colors">
                                                            @if(count($product_colors) > 0)
                                                            @foreach($product_colors as $color)
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">  
                                                                </label>
                                                                <div class="col-md-9">
                                                                    #  {{App\Color::where('id', $color->color_id)->first()->name_ar}}
                                                                    <button type="button" value="{{$color->id}}" class="btn btn-danger btn-sm delete_color" >حذف اللون</button>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @else
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">  
                                                                </label>
                                                                <div class="col-md-9">
                                                                    لا يوجد الوان اضافية
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>-->

                            <div class="form-group">
                                <label class="control-label col-md-3"> الحجم الاساسي
                                    <span class="required" aria-required="true"> (اختياري) </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::select('size_id' ,$sizes , $product->size_id , ['class' => 'form-control' , 'placeholder' => 'اختر الحجم'])}}
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <button class="btn btn-primary" type="button" id="more_sizes">اضف المزيد من الاحجام</button>
                                                                </div>-->
                            </div>

                            <!--
                                                        <div id="more_sizes_place"></div>
                                                        <div id="more_colors_place"></div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">  الاحجام الاضافية
                                                            </label>
                                                        </div>
                                                        @if(count($product_sizes) > 0)
                                                        @foreach($product_sizes as $size)
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">  
                                                            </label>
                                                            <div class="col-md-9">
                                                                #  {{App\Size::where('id' , $size->size_id)->first()->name}}
                                                                <button type="button"  value="{{$size->size_id}}" class="btn btn-danger btn-sm delete_size">حذف الحجم</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">  
                                                            </label>
                                                            <div class="col-md-9">
                                                                لا يوجد احجام اضافية
                                                            </div>
                                                        </div>
                                                        @endif
                            -->


                            <div class="form-group">
                                <label class="control-label col-md-3"> تفاصيل المنتج 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('details_ar' , $product->details_ar , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Product Details 
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-9">
                                    {{Form::textarea('details_en' , $product->details_en , ['class' => 'form-control ckeditor'])}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3">الصورة الحالية للمنتج</label>
                                <div class="col-md-9"><img src="{{URL::to('/') . '/images/products/' .$product->image}}" width="100px;" height="100px;" /></div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3"> رفع صور اخرى للمنتج وتعديلها
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('image')}}
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" id="addMoreImages" class="btn btn-success">اضغط هنا لرفع المزيد من الصور</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">
                                </label>
                                <div class="col-md-4">
                                    <div id="more_images"></div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    الصور الاضافية للمنتج
                                </label>
                                @if(count($product_images) > 0)
                                @foreach($product_images as $img)
                                <div class="col-md-3">
                                    <img src="{{URL::to('/').'/images/products/'.$img->image}}" width="100px;" />
                                    <br>
                                    <a href="{{URL::to('/admin/products/delete_image/'.$img->id)}}"  class="btn btn-danger" style="text-align: center;" >حذف الصورة</a>
                                </div>
                                @endforeach
                                @else
                                <div class="col-md-3">لايوجد صور اضافية للمنتج</div>
                                @endif
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3">   رفع  وتعديل فيديو المنتج
                                    <span class="required" aria-required="true"> اختياري </span>
                                </label>
                                <div class="col-md-4">
                                    {{Form::file('video')}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-2">     الفيديو الموجود حاليا
                                </label>
                                <div class="col-md-10">
                                    @if($product->video)
                                    <div class="col-md-6">
                                        <video width="320" height="240" controls>
                                            <source src="{{URL::to('/').'/videos/products/'.$product->video}}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                        </video>
                                        <br>
                                        <a href="{{URL::to('/admin/products/delete_video/'.$product->id)}}" class="btn btn-danger" style="text-align: center;" >حذف الفيديو</a>
                                    </div>
                                    @else
                                    لايوجد فيديو لهذا المنتج
                                    @endif
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">تعديل</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    @stop