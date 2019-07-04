@extends('layouts.app')
@section('page_title' , trans('backend.slider'))

@section('content')


@include('partials.messages')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.slider')}}
                    </h3>
                </div>
            </div>



            <div class="kt-portlet__body">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="kt_table_1_wrapper">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="table-responsive">

                                    <table id="table1" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                                            <thead>
                                            <tr>
                                                <th>{{trans('backend.image')}}</th>
                                                <th>
                                                    {{trans('backend.action')}}
                                                </th>
                                            </tr>
                                            </thead>
                        
                                            <tbody>
                        
                                            @foreach($sliders as $slider)
                                                <tr>
                        
                                                    <td> <img  style="width: 50px; display: block;"src="{{url($slider->imgeSlider->url)}}">
                                                    </td>
                                                    <td>
                                                        <a href="{{route('slider_edit',$slider->id)}}" class="btn btn-outline-primary"> {{trans('backend.update')}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                        
                        
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>































{{-- 
    <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('backend.slider')}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="table1" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{trans('backend.image')}}</th>
                        <th>
                            {{trans('backend.action')}}
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($sliders as $slider)
                        <tr>

                            <td> <img  style="width: 50px; display: block;"src="{{url($slider->imgeSlider->url)}}">
                            </td>
                            <td>
                                <a href="{{route('slider_edit',$slider->id)}}" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>--}}
    
    @endsection 
