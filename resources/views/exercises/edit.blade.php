@extends('layouts.app')
@section('page_title' , trans('backend.update'))

@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.update')}}
                    </h3>
                </div>
             
            </div>


            <div class="kt-portlet__body">
                    @if(isset($errors) > 0)
                    @if(Session::has('errors'))

                        <div class="alert alert-danger " >
                            <ul >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif


                {!! Form::open(['route'=>['exercises.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.name_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="name_ar" required class="form-control " value="{{$data->name_ar}}">
                    </div>
                </div>
                <br>



                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.name_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="name_en" required class="form-control" value="{{$data->name_en}}">
                    </div>
                </div>
                <br>




                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.rest')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="rest" required class="form-control"value="{{$data->rest}}">
                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.value_date')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select  name="value_date" id="heard" class="form-control" required>

                            <option value="sec" {{($data->value_dated == 'sec') ? 'selected' : ''}}> {{trans('backend.sec')}}</option>
                            <option value="min" {{($data->value_dated == 'min') ? 'selected' : ''}}> {{trans('backend.min')}}</option>
                            <option value="hr" {{($data->value_dated == 'hr') ? 'selected' : ''}}> {{trans('backend.hr')}}</option>
                            <option value="day" {{($data->value_dated == 'day') ? 'selected' : ''}}> {{trans('backend.day')}}</option>

                        </select>                                </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.sets')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="sets" required class="form-control" value="{{$data->sets}}">
                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.reps')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="reps" required class="form-control " value="{{$data->reps}}">
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.instructions_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="instructions_ar" id="descr"required class="form-control" >{{$data->instructions_ar}}</textarea>
                    </div>
                </div>
                <br>




                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.instructions_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="instructions_en" id="descr"required class="form-control" >{{$data->instructions_en}}</textarea>
                    </div>
                </div>
                <br>


                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.tips_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="tips_ar" id="descr"required class="form-control" >{{$data->tips_ar}}</textarea>
                    </div>
                </div>
                <br>




                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.tips_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="tips_en" id="descr"required class="form-control" >{{$data->tips_en}}</textarea>
                    </div>
                </div>
                <br>




                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.equipment')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select name="eq_id" id="heard" class="form-control" required>
                            @foreach($eqs as $d)
                                <option value="{{$d->id}}" {{($data->eq_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                            @endforeach
                        </select>                                </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.levels')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select  name="level_id" id="heard" class="form-control" required>
                            @foreach($levels as $d)
                                <option value="{{$d->id}}" {{($data->level_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                            @endforeach
                        </select>                                </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.bodys')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select  name="body_id" id="heard" class="form-control" required>
                            @foreach($bodys as $d)
                                <option value="{{$d->id}}" {{($data->body_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                            @endforeach


                        </select>
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.upload_vedio')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input id="video" class="form-control  dropify"
                               name="video"
                                type="file">
                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="name">{{trans('backend.video')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <div class="image view view-first">
                            @if(isset($data->video_url->url))
                                <video width="400" controls>
                                    <source src="{{url($data->video_url->url)}}" type="video/mp4">
                                </video>
                            @endif
                        </div>

                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.upload_image')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input id="name" class="form-control  dropify"
                               name="image"
                              type="file">
                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="name">{{trans('backend.image')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <div class="image view view-first">
                            @if(isset($data->imgeEx->url))
                                <img controls style="width: 300px; display: block;"src="{{url($data->imgeEx->url)}}">
                            @endif
                        </div>

                    </div>
                </div>



    
                <br>
                <div class="myButton">
                        <button id="send" type="submit" class="btn btn-success btn-elevate btn-pill btn-sm">{{trans('backend.update')}}</button>
                        <a href="{{route('exercises.index')}}"  class="btn btn-info btn-elevate btn-pill btn-sm">{{trans('backend.back')}}</a>

                </div>

                {!! Form::close() !!}

            </div>
</div>
































{{-- 


                    <div class="x_panel">
                        <div class="x_title">
                            <h3>{{trans('backend.update')}}</h3>

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        @if(isset($errors) > 0)
                            @if(Session::has('errors'))

                                <div class="alert alert-danger " >
                                    <ul >
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif

                        <div class="x_content">

                            {!! Form::open(['route'=>['exercises.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.name_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name_ar" required class="form-control col-md-7 col-xs-12 " value="{{$data->name_ar}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.name_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name_en" required class="form-control col-md-7 col-xs-12" value="{{$data->name_en}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.rest')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="rest" required class="form-control col-md-7 col-xs-12"value="{{$data->rest}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.value_date')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="value_date" id="heard" class="form-control" required>

                                        <option value="sec" {{($data->value_dated == 'sec') ? 'selected' : ''}}> {{trans('backend.sec')}}</option>
                                        <option value="min" {{($data->value_dated == 'min') ? 'selected' : ''}}> {{trans('backend.min')}}</option>
                                        <option value="hr" {{($data->value_dated == 'hr') ? 'selected' : ''}}> {{trans('backend.hr')}}</option>
                                        <option value="day" {{($data->value_dated == 'day') ? 'selected' : ''}}> {{trans('backend.day')}}</option>

                                    </select>                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.sets')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="sets" required class="form-control col-md-7 col-xs-12" value="{{$data->sets}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.reps')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="reps" required class="form-control col-md-7 col-xs-12" value="{{$data->reps}}">
                                </div>
                            </div>







                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.instructions_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="instructions_ar" id="descr"required class="form-control col-md-7 col-xs-12" >{{$data->instructions_ar}}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.instructions_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="instructions_en" id="descr"required class="form-control col-md-7 col-xs-12" >{{$data->instructions_en}}</textarea>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.tips_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="tips_ar" id="descr"required class="form-control col-md-7 col-xs-12" >{{$data->tips_ar}}</textarea>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.tips_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="tips_en" id="descr"required class="form-control col-md-7 col-xs-12" >{{$data->tips_en}}</textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.equipment')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="eq_id" id="heard" class="form-control" required>
                                        @foreach($eqs as $d)
                                            <option value="{{$d->id}}" {{($data->eq_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                                        @endforeach
                                    </select>                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.levels')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="level_id" id="heard" class="form-control" required>
                                        @foreach($levels as $d)
                                            <option value="{{$d->id}}" {{($data->level_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                                        @endforeach
                                    </select>                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.bodys')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select  name="body_id" id="heard" class="form-control" required>
                                        @foreach($bodys as $d)
                                            <option value="{{$d->id}}" {{($data->body_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $d->name_ar :$d->name_en}}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>





                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.upload_vedio')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="video" class="form-control col-md-7 col-xs-12 dropify"
                                           name="video"
                                            type="file">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.video')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="image view view-first">
                                        @if(isset($data->video_url->url))
                                            <video width="400" controls>
                                                <source src="{{url($data->video_url->url)}}" type="video/mp4">
                                            </video>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.upload_image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12 dropify"
                                           name="image"
                                          type="file">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="image view view-first">
                                        @if(isset($data->imgeEx->url))
                                            <img controls style="width: 300px; display: block;"src="{{url($data->imgeEx->url)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>



                >
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('exercises.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                </div>
                            </div>

                            {!! Form::close() !!}



                        </div>
                    </div> --}}


@endsection

@section('scripts')



    <script>

        $('.dropify').dropify({
            tpl: {
                wrap:            '<div class="dropify-wrapper"></div>',
                loader:          '<div class="dropify-loader"></div>',
                message:         '<div class="dropify-message"><span class="file-icon" /> <p>  {{trans("backend.upload_image")}}  </p></div>',
                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">delete</p></div></div></div>',
                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:     '<button type="button" class="dropify-clear">delete</button>',
                errorLine:       '<p class="dropify-error"> error</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>
@endsection
