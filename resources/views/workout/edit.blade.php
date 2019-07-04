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


                {!! Form::open(['route'=>['workout.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.name_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="name_ar" required
                               class="form-control" value="{{$data->name_ar}}">
                    </div>
                </div>
                <br>





                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.name_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="name_en" required
                               class="form-control" value="{{$data->name_en}}">
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.duration')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="duration" required
                               class="form-control" value="{{$data->duration}}">
                    </div>
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
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.goals')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select name="gol_id" id="heard" class="form-control" required>
                            @foreach($goal as $g)
                                <option value="{{$g->id}}" {{($data->level_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $g->name_ar :$g->name_en}}</option>
                            @endforeach
                        </select></div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.description_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="description_ar" id="descr" required
                                  class="form-control">{{$data->description_ar}}</textarea>
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.description_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="description_en" id="descr" required
                                  class="form-control">{{$data->description_en}}</textarea>
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day1')}} <span>
                        *</span>
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[0][]" style="width: 100%;" required>
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day1 as $postCat)
                                      @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                          @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach


                        </select>
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day2')}} <span>
                       *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[1][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day2 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day3')}} <span>
                       *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[2][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day3 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>











                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day4')}} <span>
                        *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[3][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day4 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>











                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day5')}} <span>
                       *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[4][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day5 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>














                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day6')}} <span>
                        *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[5][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day6 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>















                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="">{{trans('backend.day7')}} <span>
                        *</span>
                    </label>
                    <div class="col-sm-9">

                        <select class="form-control select2" multiple="multiple"
                                data-placeholder="{{trans('backend.exercises')}}"
                                name="ex_id[6][]" style="width: 100%;" >
                            @foreach($exs as $ex)
                                <option value="{{$ex->id}}"
                                        @foreach($data->day7 as $postCat)
                                        @foreach($postCat->day_exs as $postex)
                                        @if($postex->ex_id == $ex->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endforeach


                                >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
















                <div class="row form-group">
                    <label class="col-sm-12 col-form-label"
                           for="name">{{trans('backend.upload_image')}} <span
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
                            @if(isset($data->imgeWork->url))
                                <img  style="width: 300px; display: block;"src="{{url($data->imgeWork->url)}}">
                            @endif
                        </div>

                    </div>
                </div>
                <br>



    
                <br>
                <div class="myButton">
                        <button id="send" type="submit" class="btn btn-success btn-elevate btn-pill btn-sm">{{trans('backend.update')}}</button>
                        <a href="{{route('workout.index')}}"  class="btn btn-info btn-elevate btn-pill btn-sm">{{trans('backend.back')}}</a>
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

                            {!! Form::open(['route'=>['workout.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.name_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name_ar" required
                                           class="form-control col-md-7 col-xs-12" value="{{$data->name_ar}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.name_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name_en" required
                                           class="form-control col-md-7 col-xs-12" value="{{$data->name_en}}">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.duration')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="duration" required
                                           class="form-control col-md-7 col-xs-12" value="{{$data->duration}}">
                                </div>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.goals')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="gol_id" id="heard" class="form-control" required>
                                        @foreach($goal as $g)
                                            <option value="{{$g->id}}" {{($data->level_id == $d->id) ? 'selected' : ''}}> {{(app()->getLocale() == 'ar') ? $g->name_ar :$g->name_en}}</option>
                                        @endforeach
                                    </select></div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.description_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description_ar" id="descr" required
                                              class="form-control col-md-7 col-xs-12">{{$data->description_ar}}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.description_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description_en" id="descr" required
                                              class="form-control col-md-7 col-xs-12">{{$data->description_en}}</textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day1')}} <span>
                                    *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[0][]" style="width: 100%;" required>
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day1 as $postCat)
                                                  @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                      @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day2')}} <span>
                                   *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[1][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day2 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day3')}} <span>
                                   *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[2][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day3 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day4')}} <span>
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[3][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day4 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day5')}} <span>
                                   *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[4][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day5 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day6')}} <span>
                                    *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[5][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day6 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.day7')}} <span>
                                    *</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.exercises')}}"
                                            name="ex_id[6][]" style="width: 100%;" >
                                        @foreach($exs as $ex)
                                            <option value="{{$ex->id}}"
                                                    @foreach($data->day7 as $postCat)
                                                    @foreach($postCat->day_exs as $postex)
                                                    @if($postex->ex_id == $ex->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    @endforeach


                                            >{{(app()->getLocale() == 'ar') ? $ex->name_ar :$ex->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="name">{{trans('backend.upload_image')}} <span
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
                                        @if(isset($data->imgeWork->url))
                                            <img  style="width: 300px; display: block;"src="{{url($data->imgeWork->url)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>



                >
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('workout.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                </div>
                            </div>

                            {!! Form::close() !!}



                        </div>
                    </div>
 --}}

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
    <script type="text/javascript">
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    </script
@endsection
