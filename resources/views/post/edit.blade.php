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



                {!! Form::open(['route'=>['post.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="row form-group">
                                <label class="col-md-2 col-sm-12 col-form-label" for="name">{{trans('backend.title')}} <span
                                    >*</span>
                                </label>
                                <div class="col-10  col-sm-12">
                                    <input type="text" id="first-name" name="title" required class="form-control col-md-7 col-xs-12" value="{{$data->title}}">
                                </div>
                            </div>
                            <br>






                            <div class="row form-group">
                                <label class="col-md-12 col-sm-12 col-form-label"
                                       for="">{{trans('backend.tag')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-7 col-sm-12">
                                    <select name="tag_id" id="heard" class="form-control" required>
                                        @foreach($tag as $t)
                                            <option value="{{$t->id}}" {{($data->tag_id == $t->id) ? 'selected' : ''}}> {{$t->title}}</option>

                                        @endforeach
                                    </select></div>
                            </div>
                            <br>





                            <div class="row form-group">
                                <label class="col-md-2 col-sm-12 col-form-label"
                                       for="">{{trans('backend.description')}} <span
                                    >*</span>
                                </label>
                                <div class="col-10  col-sm-12">
                                    <textarea name="description" id="descr" required
                                              class="form-control col-md-7 col-xs-12">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <br>





                            <div class="row form-group">
                                <label class="col-md-2 col-sm-12 col-form-label" for="name">{{trans('backend.upload_image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-5  col-sm-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12 dropify"
                                           name="image"
                                            type="file">

                                </div>
                            </div>
                            <br>






                            <div class="row form-group">
                                <label class="col-md-2 col-sm-12 col-form-label" for="name">{{trans('backend.image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-10 col-md-10  col-sm-12">
                                    <div class="image view view-first">
                                        @if(isset($data->imgepost->url))
                                            <img  style="width: 300px; display: block;"src="{{url($data->imgepost->url)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <br>



                
                            <br>
                            <div class="myButton">
                                    <button id="send" type="submit" class="btn btn-success btn-elevate btn-pill btn-sm">{{trans('backend.update')}}</button>
                                    <a href="{{route('post.index')}}"  class="btn btn-info btn-elevate btn-pill btn-sm">{{trans('backend.back')}}</a>
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

                            {!! Form::open(['route'=>['post.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.title')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="title" required class="form-control col-md-7 col-xs-12" value="{{$data->title}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.tag')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="tag_id" id="heard" class="form-control" required>
                                        @foreach($tag as $t)
                                            <option value="{{$t->id}}" {{($data->tag_id == $t->id) ? 'selected' : ''}}> {{$t->title}}</option>

                                        @endforeach
                                    </select></div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="">{{trans('backend.description')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description" id="descr" required
                                              class="form-control col-md-7 col-xs-12">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.upload_image')}} <span
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
                                        @if(isset($data->imgepost->url))
                                            <img  style="width: 300px; display: block;"src="{{url($data->imgepost->url)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>



                >
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('post.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

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
