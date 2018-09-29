@extends('admin.layouts.master')
@section('title')
اضافة   سؤال
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
                <span class="active">اضافة  سؤال  للدعم</span>
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
                            <span class="caption-subject font-red sbold uppercase">  اضافة  سؤال  للدعم</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        {{Form::open(['url' => 'admin/supports/store/question' , 'method'=>'post' , 'class' => 'form-horizontal' , 'files' =>'TRUE'])}}
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
                            <input type="hidden" value="{{$support->id}}"  name="sectionID"/>
                            <div class="form-group">
                                <label class="control-label col-md-3"> اسم القسم
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{$support->name}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> السؤال  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('title' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Question  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::text('title_en' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> التفاصيل  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::textarea('details' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> Description  
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-md-6">
                                    {{Form::textarea('details_en' ,'' , ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">اضافة</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!-- END FORM-->
                        <hr>
                        <br>
                        <h3>الاسئلة الحالية</h3>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center"> م  </th>
                                    <th class="text-center">  السؤال </th>
                                    <th class="text-center"> تعديل </th>
                                    <th class="text-center"> حذف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                @foreach($SupportQuestions as $row)
                                <tr>
                                    <td class="text-center"> {{$x++}} </td>
                                    <td class="text-center"> {{$row->title}} </td>
                                    <td class="text-center"><a href="{{URL::to('/admin/supports/edit/question' , [$row->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td class="text-center"><a href="{{URL::to('/admin/supports/delete/question' , [$row->id])}}" onclick="return confirm('هل انت متأكد من عملية الحذف ?');"><i class="fa fa-remove" aria-hidden="true"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    @stop