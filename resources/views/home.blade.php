@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row top_tiles" style="margin: 10px 0;">
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>{{trans('backend.count_ex')}}</span>
                <h2>{{$ex}}</h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60"
                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>{{trans('backend.count_ex')}}</span>
                <h2>{{$ex}}</h2>
                <span class="sparkline_three" style="height: 160px;">
                      <canvas width="200" height="60"
                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>{{trans('backend.count_work')}}</span>
                <h2>{{$work}}</h2>
                <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60"
                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>{{trans('backend.count_work')}}</span>
                <h2>{{$work}}</h2>
                <span class="sparkline_three" style="height: 160px;">
                      <canvas width="200" height="60"
                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
            </div>
        </div>
        <br/>

            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-pie-chart"></i></div>
                        <div class="count">{{$ex}}</div>
                        <h3>{{trans('backend.count_ex')}}</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-pie-chart"></i></div>
                        <div class="count">{{$work}}</div>
                        <h3>{{trans('backend.count_work')}}</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-cutlery"></i></div>
                        <div class="count">{{$dites}}</div>
                        <h3>{{trans('backend.count_dites')}}</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                        <div class="count">{{$post}}</div>
                        <h3>{{trans('backend.count_post')}}</h3>
                    </div>
                </div>
            </div>

    </div>
    <div class="">
        <h1 class="text-center">
            {{trans('backend.welocam')}}
        </h1>
    </div>

  @endsection
