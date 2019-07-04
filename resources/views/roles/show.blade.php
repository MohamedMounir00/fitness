@extends('layouts.app')


@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
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
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong class="roleName"> {{trans('backend.name')}} : </strong>
                                    <span class="roleNameUser"> {{ $role->name }}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                {{-- <div class="form-group">
                                    <strong class="roleName">Permissions:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label style="margin:3px;background-color:#5d78ffc9" class="kt-badge kt-badge--dark kt-badge--inline">{{trans('backend.'. $v->name) }}  </label>
                                        @endforeach
                                    @endif
                                </div> --}}




                                <div class="form-group row">
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                        <div class="col-3">
                                            <span class="kt-switch kt-switch--icon">
                                                <label>
                                                    {{ Form::checkbox('permission[]', $v->id, true, array('class' => 'kt-checkbox','disabled')) }}
    
                                                    {{ trans('admin.'.$v->name) }}
                
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                        @endforeach
                                        @endif 
                                    </div>







                            </div>
                        </div>
            </div>
</div>



@endsection