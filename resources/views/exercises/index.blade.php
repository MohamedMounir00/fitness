@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('backend.exercises')}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    @can('exercise-create')

                    <li><a   href="{{route('exercises.create')}}" class=""><i class="fa fa-plus-square"></i></a>
                    </li>
                    @endcan

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="table1" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        @if(app()->getLocale() == 'ar')
                            <th>{{trans('backend.name_ar')}}</th>
                        @else
                            <th>{{trans('backend.name_en')}}</th>
                        @endif
                            <th>{{trans('backend.rest')}}</th>
                            <th>{{trans('backend.value_date')}}</th>
                            <th>{{trans('backend.sets')}}</th>
                            <th>{{trans('backend.reps')}}</th>
                            <th>{{trans('backend.levels')}}</th>
                            <th>{{trans('backend.bodys')}}</th>
                            <th>{{trans('backend.equipment')}}</th>

                        <th>{{trans('backend.date')}}</th>
                            @can('exercise-edit')

                            <th>{{trans('backend.update')}}</th>
                            @endcan
                            @can('exercise-delete')
                            <th>{{trans('backend.delete')}}</th>
                            @endcan

                    </tr>
                    </thead>


                    <tbody>



                    </tbody>
                </table>
            </div>
        </div>
    </div>@endsection
@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getex') !!}',
                columns: [
                    { data: '{{(app()->getLocale() == 'ar') ? 'name_ar' :'name_en'}}' , name: '{{(app()->getLocale() == 'ar') ? 'name_ar' :'name_en'}}' },
                    { data: 'rest', name: 'rest' },
                    { data: 'value_date', name: 'value_date' },
                    { data: 'sets', name: 'sets' },
                    { data: 'reps', name: 'reps' },
                    { data: 'level', name: 'level' },
                    { data: 'bodypart', name: 'bodypart' },
                    { data: 'equipment', name: 'equipment' },
                    { data: 'created_at', name: 'created_at' },
                        @can('exercise-edit')

                    {data: 'action', name: 'action', orderable: false, searchable: false},
                        @endcan
                        @can('exercise-delete')
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    @endcan

                ]
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
                buttons: true,
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
