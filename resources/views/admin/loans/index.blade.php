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
                        <table class=" table table-bordered table-sm table-striped table-hover datatable datatable-Loan">
                            <thead>
                                <tr>
                                    <th>

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
                                            <a class="btn btn-xs btn-light btn-outline-dark" href="{{ route('admin.loans.show', $loan->id) }}">
                                                <i class="fa fa-eye"></i>

                                            </a>

                                            <a class="btn btn-xs btn-light btn-outline-dark" href="{{ route('admin.loans.edit', $loan->id) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>


                                            <form action="{{ route('admin.loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-xs btn-light btn-outline-dark">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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

@push('scripts')
    <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('table').DataTable({
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [
                    [1, 'asc']
                ],
                language: {
                    search: ''
                },
                "searching": true, // Search Box will Be Disabled
                "ordering": true, // Ordering (Sorting on Each Column)will Be Disabled
                "info": true, // Will show "1 to n of n entries" Text at bottom
                "lengthChange": false // Will Disabled Record number per page
            });
        })

    </script>
@endpush
