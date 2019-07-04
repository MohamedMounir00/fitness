@extends('layouts.app')
@section('page_title' , trans('backend.users'))

@section('content')
@include('partials.messages')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.users')}}
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
                                        <th>{{trans('backend.name')}}</th>
                                        <th>{{trans('backend.email')}}</th>
            
                                    <th>{{trans('backend.date')}}</th>
                                    @can('user-delete')
            
                                    <th>
                                        {{trans('backend.action')}}
                                    </th>
                                        @endcan
                                </tr>
                                </thead>
            
            
                                <tbody>
            
            
            
                                </tbody>
                            </table>
                        </div>
                            </div></div></div>
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
                ajax: '{!! route('getuser') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },


                    { data: 'created_at', name: 'created_at' },
                  @can('user-delete')
                    {data: 'action', name: 'action', orderable: false, searchable: false},
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
