@extends('layouts.admin')
@section('content')
    @can('species_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.log.list.create") }}">
                    Add Log
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                Logs
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-striped table-hover datatable datatable-Species">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.species.fields.id') }}
                        </th>

                        <th>
                            {{ trans('cruds.species.fields.name') }}
                        </th>
                        <th>
                            License No
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $key => $log)
                        <tr data-entry-id="{{ $log->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $log->id ?? '' }}
                            </td>

                            <td>
                                {{ $log->name ?? '' }}
                            </td>
                            <td>
                                {{ $log->license_no ?? '' }}
                            </td>

                            <td>
{{--                                @can('species_show')--}}
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.log.list.show', $log->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
{{--                                @endcan--}}

                                @can('species_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.species.edit', $log->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

{{--                                @can('species_delete')--}}
                                    <form action="{{ route('admin.log.list.destroy', $log->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
{{--                                @endcan--}}

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
{{--            @can('species_delete')--}}
{{--            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
{{--            let deleteButton = {--}}
{{--                text: deleteButtonTrans,--}}
{{--                url: "{{ route('admin.species.massDestroy') }}",--}}
{{--                className: 'btn-danger',--}}
{{--                action: function (e, dt, node, config) {--}}
{{--                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
{{--                        return $(entry).data('entry-id')--}}
{{--                    });--}}

{{--                    if (ids.length === 0) {--}}
{{--                        alert('{{ trans('global.datatables.zero_selected') }}')--}}

{{--                        return--}}
{{--                    }--}}

{{--                    if (confirm('{{ trans('global.areYouSure') }}')) {--}}
{{--                        $.ajax({--}}
{{--                            headers: {'x-csrf-token': _token},--}}
{{--                            method: 'POST',--}}
{{--                            url: config.url,--}}
{{--                            data: { ids: ids, _method: 'DELETE' }})--}}
{{--                            .done(function () { location.reload() })--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--            dtButtons.push(deleteButton)--}}
{{--            @endcan--}}

{{--            $.extend(true, $.fn.dataTable.defaults, {--}}
{{--                order: [[ 1, 'desc' ]],--}}
{{--                pageLength: 100,--}}
{{--            });--}}
{{--            $('.datatable-Species:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
{{--            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){--}}
{{--                $($.fn.dataTable.tables(true)).DataTable()--}}
{{--                    .columns.adjust();--}}
{{--            });--}}
{{--        })--}}

{{--    </script>--}}
@endsection
