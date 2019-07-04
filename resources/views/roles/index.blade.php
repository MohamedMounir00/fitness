@extends('layouts.app')

@section('page_title' , trans('backend.role'))

@section('content')
@include('partials.messages')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{ trans('backend.role') }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                            @can('role-create')
                        <div class="kt-portlet__head-actions">

                            <a href="{{ route('roles.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                {{trans('backend.create')}}

                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>




            <div class="kt-portlet__body">
                <div class="table-responsive">
                    
            <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="table1">
                    <tr>
                        <th>{{ trans('backend.name') }}</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->name }}</td>
    
                            <td>
    
                                    <a class="btn btn-primary btn-elevate btn-pill btn-sm" href="{{ route('roles.show',$role->id) }}"> {{trans('backend.details')}}</a>
                                @if($role->name !='admin')
    
                                @can('role-edit')
                                        <a class="btn btn-info btn-elevate btn-pill btn-sm" href="{{ route('roles.edit',$role->id) }}"> {{trans('backend.update')}}</a>
                                    @endcan
                                    @can('role-delete')
    
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
    
                                        {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger btn-elevate btn-pill btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                @endif
    
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
</div>








































{{-- 



    <div class="col-sm-12">
    <div class="white-box">
        {{-- <h3 class="box-title m-b-0">Bordered Table</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p> 
        <div class="table-responsive">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ trans('backend.role') }}</h2>
                    </div>
                    @can('role-create')

                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> <i class="fa fa-save"></i></a>
                        </div>
                    @endcan
                </div>
            </div>





            <table class="table table-bordered">
                <tr>
                    <th>{{ trans('backend.name') }}</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->name }}</td>

                        <td>

                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                            @if($role->name !='admin')

                            @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('role-delete')

                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                                    {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            @endif

                        </td>
                    </tr>
                @endforeach
            </table>


        </div>
    </div>
    </div>
     --}}

@endsection

@section('scripts')
>

    <script>

        function ConfirmDelete()
        {
            var x = confirm("'هل انت متاكد من حذف هذه المهام؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endsection