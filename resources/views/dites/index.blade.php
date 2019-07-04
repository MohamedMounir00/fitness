@extends('layouts.app')
@section('page_title' , trans('backend.dites'))

@section('content')
@include('partials.messages')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.dites')}}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                            @can('recipe-create')
                        <div class="kt-portlet__head-actions">
                           
                            <a href="{{route('dites.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                {{trans('backend.create')}}

                            </a>
                        </div>
                        @endcan
                    </div>
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
                                                @if(app()->getLocale() == 'ar')
                                                <th>{{trans('backend.name_ar')}}</th>
                                                @else
                                                <th>{{trans('backend.name_en')}}</th>
                                                     @endif
                                                <th>{{trans('backend.calories')}} g</th>
                                                <th>{{trans('backend.carbs')}}</th>
                                                <th>{{trans('backend.protein')}}</th>
                                                <th>{{trans('backend.fat')}}</th>
                                                <th>{{trans('backend.servings')}}</th>
                                                <th>{{trans('backend.total_time')}}</th>
                                                <th>{{trans('backend.category')}}</th>
                                                <th>{{trans('backend.date')}}</th>
                                                    @can('recipe-edit')
                        
                                                    <th>{{trans('backend.update')}}</th>
                                                    @endcan
                                                    @can('recipe-delete')
                                                    <th>{{trans('backend.delete')}}</th>
                                                    @endcan
                        
                                            </tr>
                                            </thead>
                        
                        
                                            <tbody>
                        
                        
                        
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

































    @endsection 
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script>
        $(function() {
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getdites') !!}',
                columns: [
                    { data: '{{(app()->getLocale() == 'ar') ? 'name_ar' :'name_en'}}' , name: '{{(app()->getLocale() == 'ar') ? 'name_ar' :'name_en'}}' },

                    { data: 'calories', name: 'calories'},
                    { data: 'carbs', name: 'carbs' },
                    { data: 'protein', name: 'protein' },
                    { data: 'fat', name: 'fat' },
                    { data: 'servings', name: 'servings' },
                    { data: 'total_time', name: 'total_time' },
                    { data: 'cat', name: 'cat' },
                    { data: 'created_at', name: 'created_at' },
                        @can('recipe-edit')

                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    @endcan
                        @can('recipe-delete')

                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    @endcan

                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "{{trans('backend.No_data_available_in_table')}}",
                    "infoEmpty": "{{trans('backend.Showing_0_to_0_of_0_entries')}}",
                    "info":           "{{trans('backend.showing')}}_START_ {{trans('backend.to')}} _END_ {{trans('backend.of')}} _TOTAL_{{trans('backend.entries')}} ",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "{{trans('backend.show_t')}}_MENU_ {{trans('backend.entries')}}",
                    "search": "{{trans('backend.search')}}",
                    "zeroRecords": "{{trans('backend.No_matching_records_found')}}",
                    "processing":     "{{trans('backend.processing')}}",

                    "paginate": {
                        "first": "{{trans('backend.First')}}",
                        "last": "{{trans('backend.Last')}}",
                        "next": "{{trans('backend.Next')}}",
                        "previous": "{{trans('backend.Previous')}}"
                    }

                }
            });
        });
    </script>
    <script>
        $('#table1').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
          ;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');



            swal({
                title: "{{trans('backend.ask_delete')}}",
                type: "warning",
                buttons: ['{{trans('backend.no')}}', '{{trans('backend.yes')}}'],
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then(function(yes) {
                if (yes) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', submit: true}
                    }).always(function (data) {
                        $('#table1').DataTable().draw(false);
                    });
                }
                else {
                    return false;
                }
            })

        })
    </script>
@endsection
