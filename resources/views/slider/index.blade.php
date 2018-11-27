@extends('layouts.app')

@section('content')
    @include('partials.messages')

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
    </div>@endsection
