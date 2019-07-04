@extends('layouts.app')

@section('content')


<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                        {{trans('backend.welocam')}}
                </h3>
            </div>
            
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-widget17">
                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #5d78ffc9">
                    <div class="kt-widget17__chart" style="height:190px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="kt_chart_activities" width="519" height="216" class="chartjs-render-monitor" style="display: block; width: 519px; height: 216px;"></canvas>
                    </div>
                </div>
                <div class="kt-widget17__stats">



                    <div class="kt-widget17__items">






                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <rect id="Rectangle-62-Copy" fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect id="Rectangle-62-Copy-2" fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" id="Path-95" fill="#000000" fill-rule="nonzero"/>
                                            <rect id="Rectangle-62-Copy-4" fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle">
                                    {{$ex}}
                            </span>
                            <span class="kt-widget17__desc">
                                    {{trans('backend.count_ex')}}
                            </span>
                        </div>









                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" id="Path-95" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" id="Path-97" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.000019, 10.749981) scale(1, -1) translate(-14.000019, -10.749981) "/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle">
                                    {{$work}}
                            </span>
                            <span class="kt-widget17__desc">
                                    {{trans('backend.count_work')}}
                            </span>
                        </div>
                   






                    
                    <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <path d="M11.19545,6.19223206 C11.2941509,6.2658397 11.4081961,6.3223288 11.5343747,6.35613825 L14.8030431,7.23197532 C15.3365092,7.37491713 15.8848462,7.05833464 16.027788,6.52486854 C16.1707298,5.99140244 15.8541473,5.44306548 15.3206812,5.30012367 L13.2275533,4.73927173 C16.4954421,2.66182639 19.4878904,2.0173276 20.8388348,3.36827202 C22.7914562,5.32089348 20.5753788,10.7027958 15.8890873,15.3890873 C11.2027958,20.0753788 5.82089348,22.2914562 3.86827202,20.3388348 C2.62548725,19.09605 3.07141707,16.4640844 4.76814099,13.5064591 C4.7897653,13.5138626 4.81179025,13.5205819 4.83419784,13.526586 L7.73197532,14.3030431 C8.26544142,14.4459849 8.81377838,14.1294025 8.95672019,13.5959364 C9.099662,13.0624702 8.78307952,12.5141333 8.24961341,12.3711915 L5.9033479,11.7425115 C6.37500284,11.0805256 6.90175318,10.4129718 7.47909619,9.75078536 C7.49687425,9.7566253 7.51491726,9.76200524 7.53321544,9.76690822 L11.2675092,10.7675092 C11.8009753,10.910451 12.3493123,10.5938685 12.4922541,10.0604024 C12.6351959,9.52693634 12.3186134,8.97859939 11.7851473,8.83565757 L9.03862784,8.0997299 C9.74794411,7.4052623 10.4715898,6.76749233 11.19545,6.19223206 Z" id="Combined-Shape" fill="#000000"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle">
                                    {{$dites}}
                            </span>
                            <span class="kt-widget17__desc">
                                    {{trans('backend.count_dites')}}
                            </span>
                        </div>
                   






                        




                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000"/>
                                            <rect id="Rectangle-152" fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                            <rect id="Rectangle-152-Copy" fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle">
                                    {{$post}}
                            </span>
                            <span class="kt-widget17__desc">
                                    {{trans('backend.count_post')}}
                            </span>
                        </div>
                        
                    </div>

                </div>

                
                </div>
            </div>
        </div>
    </div>





























{{-- 









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
    </div> --}}

  @endsection
