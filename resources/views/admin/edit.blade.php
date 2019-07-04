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




                {!! Form::open(['route'=>['admin.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label" for="">{{trans('backend.name')}} <span>*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" required class="form-control" value="{{$data->name}}">
                                </div>
                            </div>
                            <br>


                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label" for="">{{trans('backend.email')}} <span
                                    >*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="email"  name="email" required class="form-control" value="{{$data->email}}">
                                </div>
                            </div>

                            <br>

                            <div class="row form-group">
                                <label class="col-sm-12 col-form-label" for="">{{trans('backend.password')}} <span
                                    >*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="password"  name="password"  class="form-control" placeholder="{{trans('backend.password')}}">
                                </div>
                            </div>

                            <br>


                            @if(auth()->user()->hasRole('admin'))
                                @if(auth()->user()->id!=$data->id)
                                    @if($data->role=='admin')
                            <div class="row form-group">
                                <label class="col-sm-12 col-form-label" for="">{{trans('backend.role')}} <span>*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.role')}}"
                                            name="roles[]" style="width: 100%;" >
                                        @foreach($roles as $cat)
                                            <option value="{{$cat->id}}"

                                                    @foreach($data->roles as $postCat)
                                                    @if($postCat->id == $cat->id)
                                                    selected
                                                    @endif
                                                    @endforeach

                                            > {{$cat->name}}</option>
                                        @endforeach

                                    </select>                                </div>
                            </div>
                                    @endif
                                    @endif
                                    @endif



                            <br>














                            <div class="row form-group">
                                <label class="col-sm-12 col-form-label" for="name">{{trans('backend.upload_image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-sm-9 ">
                                    <input id="name" class="form-control col-md-7 col-xs-12 dropify"
                                           name="imge"
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
                                        @if(isset($data->imge))
                                            <img  style="width: 300px; display: block;"src="{{url($data->imge)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>



                
                            <br>
                            <div class="myButton">
                                    <button id="send" type="submit" class="btn btn-success btn-elevate btn-pill btn-sm ">{{trans('backend.update')}}</button>
                                    <a href="{{route('admin.index')}}"  class="btn btn-info btn-elevate btn-pill btn-sm">{{trans('backend.back')}}</a>
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

                            {!! Form::open(['route'=>['admin.update',$data->id],'method'=>'PUT','class'=>'form-horizontal form-label-left ','novalidate','files'=>true]) !!}


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.name')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" required class="form-control col-md-7 col-xs-12" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.email')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email"  name="email" required class="form-control col-md-7 col-xs-12" value="{{$data->email}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.password')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password"  name="password"  class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            @if(auth()->user()->hasRole('admin'))
                                @if(auth()->user()->id!=$data->id)
                                    @if($data->role=='admin')
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{{trans('backend.role')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="{{trans('backend.role')}}"
                                            name="roles[]" style="width: 100%;" >
                                        @foreach($roles as $cat)
                                            <option value="{{$cat->id}}"

                                                    @foreach($data->roles as $postCat)
                                                    @if($postCat->id == $cat->id)
                                                    selected
                                                    @endif
                                                    @endforeach

                                            > {{$cat->name}}</option>
                                        @endforeach

                                    </select>                                </div>
                            </div>
                                    @endif
                                    @endif
                                    @endif
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.upload_image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12 dropify"
                                           name="imge"
                                            type="file">

                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('backend.image')}} <span
                                    >*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="image view view-first">
                                        @if(isset($data->imge))
                                            <img  style="width: 300px; display: block;"src="{{url($data->imge)}}">
                                        @endif
                                    </div>

                                </div>
                            </div>



                >
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">{{trans('backend.update')}}</button>
                                    <a href="{{route('admin.index')}}"  class="btn btn-primary">{{trans('backend.back')}}</a>

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
    <script type="text/javascript">
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    </script>
@endsection
