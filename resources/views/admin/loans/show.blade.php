@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <a class="btn btn-light" href="http://nl-pipeline.test/admin/loans">
                    <i class="fa fa-arrow-left"></i> Back to list
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
            <div class="card-header">
                {{ trans('global.show') }} Loan
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.id') }}
                            </th>
                            <td>
                                {{ $loan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.loan_number') }}
                            </th>
                            <td>
                                {{ $loan->loan_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.product') }}
                            </th>
                            <td>
                                {{ $loan->product->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.customer') }}
                            </th>
                            <td>
                                {{ $loan->customer }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.lender') }}
                            </th>
                            <td>
                                {{ $loan->lender }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.processor') }}
                            </th>
                            <td>
                                {{ $loan->processor }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.loan_amount') }}
                            </th>
                            <td>
                                {{ $loan->loan_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Appraisal Ordered
                            </th>
                            <td>
                                <span class="label label-info">
                                @if( ! empty( $loan->appraisal_ordered ) )
                                        Yes
                                    @else
                                        No
                                    @endif
                            </span>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                Flood Ordered
                            </th>
                            <td>
                                <span class="label label-info">
                                    @if( ! empty( $loan->flood_ordered ) )
                                        Yes
                                    @else
                                        No
                                    @endif
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Title Ordered
                            </th>
                            <td>
                                <span class="label label-info">

                                @if( ! empty( $loan->flood_ordered ) )
                                        Yes
                                    @else
                                        No
                                    @endif
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.contract_price') }}
                            </th>
                            <td>
                                {{ $loan->contract_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.closing_date') }}
                            </th>
                            <td>
                                {{ $loan->closing_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.closing_time') }}
                            </th>
                            <td>
                                {{ $loan->closing_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.closing_location') }}
                            </th>
                            <td>
                                {{ $loan->closing_location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.closing_confirmed') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $loan->closing_confirmed ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.title_company') }}
                            </th>
                            <td>
                                {{ $loan->title_company }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.interest_rate') }}
                            </th>
                            <td>
                                {{ $loan->interest_rate }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.interest_rate_locked') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $loan->interest_rate_locked ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.interest_rate_expiration') }}
                            </th>
                            <td>
                                {{ $loan->interest_rate_expiration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.approval_required') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $loan->approval_required ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.approval_documents_signed') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $loan->approval_documents_signed ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.address') }}
                            </th>
                            <td>
                                {{ $loan->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.contact_info') }}
                            </th>
                            <td>
                                {{ $loan->contact_info }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.loan.fields.notes') }}
                            </th>
                            <td>
                                {{ $loan->notes }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

        </div>
        <div class="row">
        <div class="col">
            <div class="form-group">
                <a class="btn btn-light" href="http://nl-pipeline.test/admin/loans">
                    <i class="fa fa-arrow-left"></i> Back to list
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
