@extends('layouts.admin')
@section('content')
    @can('tdp_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.tdp.list.create") }}">
                    Add TDP
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">
                TDP
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
                                @php
                                $statusLog = $log->status()->get()->last();
                                $userroles = auth()->user()->roles()->pluck('title');
                                $roles = [];
                                foreach($userroles as $role){
                                    $roles[] = $role;
                                }
                                @endphp
                                @if(in_array($statusLog->status,['Submitted','Rejected','Disapproved']) && $log->user_id == auth()->user()->id)
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tdp.list.edit', $log->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif
                                @if(in_array($statusLog->status,['Paid']) && $log->user_id == auth()->user()->id)
                                    <a class="btn btn-xs btn-success" href="#">
                                        Print
                                    </a>
                                @endif
                                @if($log->user_id != auth()->user()->id)
                                @can('tdp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tdp.list.edit', $log->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @endif

                                @can('tdp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tdp.list.show', $log->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

{{--                                @can('tdp_edit')--}}
{{--                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tdp.edit', $log->id) }}">--}}
{{--                                        {{ trans('global.edit') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}

                                @can('tdp_delete')
                                    <form action="{{ route('admin.tdp.list.destroy', $log->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                                @can('tdp_assignto')
                                    @if($statusLog->status == "Submitted")
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tdp.list.assign', $log->id) }}">Assign to KPPM</a>
                                    @endif
                                @endcan
                                
                                @if($statusLog->status == "Assigned" && in_array('KPPM',$roles))
                                    <button type="button" class="btn btn-xs btn-info " data-toggle="modal" data-target="#exampleModal" data-status="Accepted" data-tdp_list_id="{{$log->id}}">Accept</button>

                                    <button type="button" class="btn btn-xs btn-danger " data-toggle="modal" data-target="#exampleModal" data-status="Rejected" data-tdp_list_id="{{$log->id}}">Reject</button>
                                @endif

                                @if(in_array($statusLog->status,["Accepted"]) && in_array('DFO',$roles))
                                    <button type="button" class="btn btn-xs btn-info " data-toggle="modal" data-target="#exampleModal" data-status="Approved" data-tdp_list_id="{{$log->id}}">Approved</button>

                                    <button type="button" class="btn btn-xs btn-danger " data-toggle="modal" data-target="#exampleModal" data-status="Disapproved" data-tdp_list_id="{{$log->id}}">Disapproved</button>
                                @endif
                                @if(in_array($statusLog->status,["Approved"]) && in_array('Financial Officer',$roles))
                                    <button type="button" class="btn btn-xs btn-info " data-toggle="modal" data-target="#exampleModal" data-status="Paid" data-tdp_list_id="{{$log->id}}">Paid</button>
                                @endif


                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('admin.tdp.list.statuslog')}}">
        @csrf 
        <div class="modal-body">
            <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea name="reason" class="form-control" id="reason"></textarea>
            </div>
            <input type="hidden" id="tdp_list_id" name="tdp_list_id" value="">
            <input type="hidden" name="status" id="status" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>
        jQuery(document).ready(function($){
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var status = button.data('status');
                var tdp_list_id = button.data('tdp_list_id');
                
                var modal = $(this)
                modal.find('.modal-title').text('Reason to ' + status)
                modal.find('.modal-body #status').val(status)
                modal.find('.modal-body #tdp_list_id').val(tdp_list_id)
            })
        })
    </script>
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
