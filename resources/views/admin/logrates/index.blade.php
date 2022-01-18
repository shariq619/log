@extends('layouts.admin')
@section('content')
    @can('species_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.logrates.create") }}">
                    {{ trans('global.add') }} Log Rate
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                Log Rate {{ trans('global.list') }}
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
                            Market
                        </th>
                        <th>
                            Class
                        </th>
                        <th>
                            Species
                        </th>
                        <th>
                            Land Type
                        </th>
                        <th>
                            Method
                        </th>
                        <th>
                            Log Size
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logrates as $key => $rate)
                        <tr data-entry-id="{{ $rate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rate->markete ?? '' }}
                            </td>
                            <td>
                                {{ $rate->class ?? '' }}
                            </td>
                            <td>
                                {{ $rate->species->name ?? '' }}
                            </td>
                            <td>
                                {{ $rate->landstatus->name ?? '' }}
                            </td>
                            <td>
                                {{ $rate->method ?? '' }}
                            </td>
                            <td>
                                {{ $rate->logsize->name ?? '' }}
                            </td>
                            <td>
                                {{ $rate->price ?? '' }}
                            </td>
                            <td>
                                @can('lograte_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.logrates.edit', $rate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lograte_delete')
                                    <form action="{{ route('admin.logrates.destroy', $rate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('logsize_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.logsizes.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Species:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
