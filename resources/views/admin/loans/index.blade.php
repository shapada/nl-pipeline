@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <span class="text-bold">New Loan Pipeline</span>
                        @can('loan_create')
                            <a class="btn btn-sm btn-success pull-right" href="{{ route('admin.loans.create') }}">
                                <i class="fa fa-plus"></i> {{ trans('global.add') }} {{ trans('cruds.loan.title_singular') }}
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        {{-- <loans-datatable></loans-datatable> --}}
                        <table class="table table-bordered table-sm table-striped table-hover datatable datatable-Loan">
                            <thead>
                                <tr> 
                                     
                        <th width="10">

                        </th>
                                    <th>
                                        {{ trans('cruds.loan.fields.loan_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.loan.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.loan.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.loan.fields.lender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.loan.fields.title_company') }}
                                    </th>
                                    <th>
                                        Services
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $key => $loan)
                                    <tr data-entry-id="{{ $loan->id }}">
                                        <td>
                                        </td>
                                        <td>
                                            {{ $loan->loan_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $loan->product->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $loan->customer ?? '' }}
                                        </td>
                                        <td>
                                            {{ $loan->lender ?? '' }}
                                        </td>
                                        <td>
                                            {{ $loan->title_company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $loan->title_company ?? '' }}
                                            @if (!empty($loan->appraisal_ordered))
                                                <span class="badge badge-primary">Appraisal</span>
                                            @endif

                                            @if (!empty($loan->flood_ordered))
                                                <span class="badge badge-info">Flood</span>
                                            @endif

                                            @if (!empty($loan->title_ordered))
                                                <span class="badge badge-info">Title</span>

                                            @endif
                                        </td>
                                        <td class="text-center">
                                           @can('loan_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.loans.show', $loan->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                            @endcan

                                            @can('loan_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.loans.edit', $loan->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                @can('loan_delete')
                                    <form action="{{ route('admin.loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        </div>
    </div>

@endsection

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.loans.massDestroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Loan:not(.ajaxTable)').DataTable({
      buttons: dtButtons,
      columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
    })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
