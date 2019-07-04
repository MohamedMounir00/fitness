@extends('layouts.app')
@section('page_title' , trans('backend.create'))

@section('content')




<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.create')}}
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


                {!! Form::open(['route'=>['dites.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.name_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="first-name" name="name_ar" required class="form-control ">
                    </div>
                </div>
                <br>






                    <div class="row form-group">
                        <label class="col-sm-12 col-form-label" for="">{{trans('backend.name_en')}} <span
                                    >*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="first-name" name="name_en" required class="form-control">
                        </div>
                    </div>
                    <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.calories')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="calories" required class="form-control">
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.carbs')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="carbs" required class="form-control">
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.protein')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="protein" required class="form-control">
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.fat')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="fat" required class="form-control">
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.servings')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="servings" required class="form-control">
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.total_time')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="number" id="first-name" name="total_time" required class="form-control ">
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.category')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <select name="cat_id" id="heard" class="form-control" required>
                            @foreach($cat as $data)
                                <option value="{{$data->id}}">{{(app()->getLocale() == 'ar') ? $data->name_ar :$data->name_en}}</option>
                            @endforeach
                        </select>                                </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.description_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="description_ar" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.description_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="description_en" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>








                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.ingredients_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="ingredients_ar" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.ingredients_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="ingredients_en" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>






                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.directions_ar')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="directions_ar" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>







                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="">{{trans('backend.directions_en')}} <span
                        >*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea name="directions_en" id="descr"required class="form-control" ></textarea>
                    </div>
                </div>
                <br>









                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="name">{{trans('backend.upload_image')}} <span
                               >*</span>
                    </label>
                    <div class="col-sm-9">
                        <input id="name" class="form-control dropify"
                                name="image"
                                required="required" type="file">
                    </div>
                </div>
                <br>








                    <br>
                    <div class="myButton">
                            <button id="send" type="submit" class="btn btn-success btn-elevate btn-pill btn-sm">{{trans('backend.save')}}</button>
                            <a href="{{route('dites.index')}}"  class="btn btn-primary btn-elevate btn-pill btn-sm">{{trans('backend.back')}}</a>
                    </div>

                {!! Form::close() !!}
            </div>
</div>


















































{{-- 

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{trans('backend.create')}}</h3>
                </div>


            </div>


            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                            </h2>
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

                                {!! Form::open(['route'=>['dites.store'],'method'=>'POST','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.name_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="name_ar" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.name_en')}} <span
                                                >*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="name_en" required class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.calories')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="calories" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.carbs')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="carbs" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.protein')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="protein" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.fat')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="fat" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.servings')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="servings" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.total_time')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="first-name" name="total_time" required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.category')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="cat_id" id="heard" class="form-control" required>
                                        @foreach($cat as $data)
                                            <option value="{{$data->id}}">{{(app()->getLocale() == 'ar') ? $data->name_ar :$data->name_en}}</option>
                                        @endforeach
                                    </select>                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.description_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description_ar" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.description_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description_en" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.ingredients_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="ingredients_ar" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.ingredients_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="ingredients_en" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.directions_ar')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="directions_ar" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.directions_en')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="directions_en" id="descr"required class="form-control col-md-7 col-xs-12" ></textarea>
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.upload_image')}} <span
                                           >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12 dropify"
                                            name="image"
                                            required="required" type="file">
                                </div>
                            </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success">{{trans('backend.save')}}</button>
                                        <a href="{{route('dites.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

                                    </div>
                                </div>

                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
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
