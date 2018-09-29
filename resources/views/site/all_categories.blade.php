@extends('site.layouts.master')
@section('content')

<section id="all-category" class="dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="all-category-item">
                    <ul>
                        <?php $first_section = App\Section::where('status' , 1)->first(); ?>
                        @if(!empty($first_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$first_section->id . '/' .str_replace(' ', '-', $first_section->name_en)}}">{{$first_section->name_en}}</a></h2>
                        <?php $first_types = App\Type::where('section_id', $first_section->id)->get(); ?>
                        @foreach($first_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$first_section->id  . '/' .str_replace(' ', '-', $first_section->name_en)}}">{{$first_section->name_ar}}</a></h2>
                        <?php $first_types = App\Type::where('section_id', $first_section->id)->get(); ?>
                        @foreach($first_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
                <div class="all-category-item">
                    <ul>
                        <?php $second_section = App\Section::skip(1)->where('status' , 1)->first(); ?>
                        @if(!empty($second_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$second_section->id. '/' .str_replace(' ', '-', $second_section->name_en) }}">{{$second_section->name_en}}</a></h2>
                        <?php $second_types = App\Type::where('section_id', $second_section->id)->get(); ?>
                        @foreach($second_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$second_section->id . '/' .str_replace(' ', '-', $second_section->name_en)}}">{{$second_section->name_ar}}</a></h2>
                        <?php $second_types = App\Type::where('section_id', $second_section->id)->get(); ?>
                        @foreach($second_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="all-category-item">
                    <ul>
                        <?php $third_section = App\Section::skip(2)->where('status' , 1)->first(); ?>
                        @if(!empty($third_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$third_section->id . '/' .str_replace(' ', '-', $third_section->name_en)}}">{{$third_section->name_en}}</a></h2>
                        <?php $third_types = App\Type::where('section_id', $third_section->id)->get(); ?>
                        @foreach($third_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$third_section->id . '/' .str_replace(' ', '-', $third_section->name_en)}}">{{$third_section->name_ar}}</a></h2>
                        <?php $third_types = App\Type::where('section_id', $third_section->id)->get(); ?>
                        @foreach($third_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
                <div class="all-category-item">
                    <ul>
                        <?php $fourth_section = App\Section::skip(3)->where('status' , 1)->first(); ?>
                        @if(!empty($fourth_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$fourth_section->id . '/' .str_replace(' ', '-', $fourth_section->name_en)}}">{{$fourth_section->name_en}}</a></h2>
                        <?php $fourth_types = App\Type::where('section_id', $fourth_section->id)->get(); ?>
                        @foreach($fourth_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$fourth_section->id . '/' .str_replace(' ', '-', $fourth_section->name_en)}}">{{$fourth_section->name_ar}}</a></h2>
                        <?php $fourth_types = App\Type::where('section_id', $fourth_section->id)->get(); ?>
                        @foreach($fourth_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="all-category-item">
                    <ul>
                        <?php $five_section = App\Section::skip(4)->where('status' , 1)->first(); ?>
                        @if(!empty($five_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$five_section->id . '/' .str_replace(' ', '-', $five_section->name_en)}}">{{$five_section->name_en}}</a></h2>
                        <?php $five_types = App\Type::where('section_id', $five_section->id)->get(); ?>
                        @foreach($five_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$five_section->id . '/' .str_replace(' ', '-', $five_section->name_en)}}">{{$five_section->name_ar}}</a></h2>
                        <?php $five_types = App\Type::where('section_id', $five_section->id)->get(); ?>
                        @foreach($five_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
                <div class="all-category-item">
                    <ul>
                        <?php $six_section = App\Section::skip(5)->where('status' , 1)->first(); ?>
                        @if(!empty($six_section))
                        @if($lang == 'en')
                        <h2><a href="{{URL::to($lang.'/section').'/'.$six_section->id . '/' .str_replace(' ', '-', $six_section->name_en)}}">{{$six_section->name_en}}</a></h2>
                        <?php $six_types = App\Type::where('section_id', $six_section->id)->get(); ?>
                        @foreach($six_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_en}}</a></li>
                        @endforeach
                        @else
                        <h2><a href="{{URL::to($lang.'/section').'/'.$six_section->id . '/' .str_replace(' ', '-', $six_section->name_en)}}">{{$six_section->name_ar}}</a></h2>
                        <?php $six_types = App\Type::where('section_id', $six_section->id)->get(); ?>
                        @foreach($six_types as $type)
                        <li><a href="{{URL::to($lang.'/type').'/'.$type->id}}">{{$type->name_ar}}</a></li>
                        @endforeach
                        @endif
                        @endif
                    </ul>
                </div>
            </div>



        </div>

    </div>

</section>

@stop