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
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                          
                            <a href="{{ route('roles.index') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                {{trans('backend.back')}}
                            </a>
                        </div>
                    </div>
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



                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group row">
                        <label for="example-text-input " class="col-md-2 col-sm-12 col-form-label">{{trans('backend.name')}} : </label>
                        <div class="col-10 col-sm-12">
                            {!! Form::text('name', null, array('placeholder' => trans('backend.name'),'class' => 'form-control required')) !!}
                        </div>
                    </div>
        </div>



        <br><br><br><br>
       


        
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                           {{trans('backend.permission')}}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                        <div class="form-group row">
                                @foreach($permission as $value)
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                   
                                <span class="kt-switch">
                                        
                                    <label>
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ trans('backend.'.$value->name) }}
                                        <span></span>
                                    </label>
                                    
                                </span>
                               
                            </div>
                            @endforeach
                        </div>
                </div>




        <div class="myButton">
            <button type="submit" class="btn btn-primary btn-elevate btn-pill btn-sm" style="padding:10px 20px">{{trans('backend.create')}}</button>
        </div>





    </div>





    
    {!! Form::close() !!}

    </div>

</div>





























































{{-- 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>{{trans('backend.create')}}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{trans('backend.back')}}</a>
            </div>
        </div>
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

    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الاسم:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الصلحيات:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">اضف</button>
        </div>
    </div>
    {!! Form::close() !!} --}}


@endsection