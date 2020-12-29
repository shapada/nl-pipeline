@extends('layouts.admin')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.create') }} {{ trans('cruds.loan.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.loans.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="required" for="loan_number">{{ trans('cruds.loan.fields.loan_number') }}</label>
                                        <input class="form-control {{ $errors->has('loan_number') ? 'is-invalid' : '' }}" type="number" name="loan_number" id="loan_number" value="{{ old('loan_number', '') }}" step="1" required>
                                        @if ($errors->has('loan_number'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('loan_number') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.loan.fields.loan_number_helper') }}</span>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            Loan Details
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="product_id">{{ trans('cruds.loan.fields.product') }}</label>
                                                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                                                    @foreach ($products as $id => $product)
                                                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('product'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('product') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.product_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="contract_price">{{ trans('cruds.loan.fields.contract_price') }}</label>
                                                <input class="form-control {{ $errors->has('contract_price') ? 'is-invalid' : '' }}" type="number" name="contract_price" id="contract_price" value="{{ old('contract_price', '') }}" step="0.01">
                                                @if ($errors->has('contract_price'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('contract_price') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.contract_price_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="required" for="customer">{{ trans('cruds.loan.fields.customer') }}</label>
                                                <input class="form-control {{ $errors->has('customer') ? 'is-invalid' : '' }}" type="text" name="customer" id="customer" value="{{ old('customer', '') }}" required>
                                                @if ($errors->has('customer'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('customer') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.customer_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="lender">{{ trans('cruds.loan.fields.lender') }}</label>
                                                <input class="form-control {{ $errors->has('lender') ? 'is-invalid' : '' }}" type="text" name="lender" id="lender" value="{{ old('lender', '') }}" onkeydown="limit(this);" onkeyup="limit(this);">
                                                @if ($errors->has('lender'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('lender') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.lender_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="required" for="processor">{{ trans('cruds.loan.fields.processor') }}</label>
                                                <input class="form-control {{ $errors->has('processor') ? 'is-invalid' : '' }}" type="text" name="processor" id="processor" value="{{ old('processor', '') }}" onkeydown="limit(this);" onkeyup="limit(this);" required>
                                                @if ($errors->has('processor'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('processor') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.processor_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="loan_amount">{{ trans('cruds.loan.fields.loan_amount') }}</label>
                                                <input class="form-control {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', '') }}" step="0.01">
                                                @if ($errors->has('loan_amount'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('loan_amount') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.loan_amount_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">{{ trans('cruds.loan.fields.address') }}</label>
                                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                                                @if ($errors->has('address'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('address') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.address_helper') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            Closing Details
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="closing_date">{{ trans('cruds.loan.fields.closing_date') }}</label>
                                                <input class="form-control datepicker {{ $errors->has('closing_date') ? 'is-invalid' : '' }}" type="text" name="closing_date" id="closing_date" value="{{ old('closing_date') }}">
                                                @if ($errors->has('closing_date'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('closing_date') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_date_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="closing_time">{{ trans('cruds.loan.fields.closing_time') }}</label>
                                                <input class="form-control timepicker {{ $errors->has('closing_time') ? 'is-invalid' : '' }}" type="text" name="closing_time" id="closing_time" value="{{ old('closing_time') }}">
                                                @if ($errors->has('closing_time'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('closing_time') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_time_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="closing_location">{{ trans('cruds.loan.fields.closing_location') }}</label>
                                                <input class="form-control {{ $errors->has('closing_location') ? 'is-invalid' : '' }}" type="text" name="closing_location" id="closing_location" value="{{ old('closing_location', '') }}">
                                                @if ($errors->has('closing_location'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('closing_location') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_location_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check {{ $errors->has('closing_confirmed') ? 'is-invalid' : '' }}">
                                                    <input type="hidden" name="closing_confirmed" value="0">
                                                    <input class="form-check-input" type="checkbox" name="closing_confirmed" id="closing_confirmed" value="1" {{ old('closing_confirmed', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="closing_confirmed">{{ trans('cruds.loan.fields.closing_confirmed') }}</label>
                                                </div>
                                                @if ($errors->has('closing_confirmed'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('closing_confirmed') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_confirmed_helper') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header bg-white">Services</div>
                                        <div class="card-body">


                                            <div class="form-group">
                                                <label for="title_company">{{ trans('cruds.loan.fields.title_company') }}</label>
                                                <input class="form-control {{ $errors->has('title_company') ? 'is-invalid' : '' }}" type="text" name="title_company" id="title_company" value="{{ old('title_company', '') }}">
                                                @if ($errors->has('title_company'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('title_company') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.title_company_helper') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check {{ $errors->has('appraisal_ordered') ? 'is-invalid' : '' }}">
                                                    <input type="hidden" name="appraisal_ordered" value="0">
                                                    <input class="form-check-input" type="checkbox" name="appraisal_ordered" id="appraisal_ordered" value="1" {{ old('closing_confirmed', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ml-2" for="appraisal_ordered">Appraisal Ordered</label>
                                                </div>
                                                @if ($errors->has('closing_confirmed'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('appraisal_ordered') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_confirmed_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check {{ $errors->has('flood_ordered') ? 'is-invalid' : '' }}">
                                                    <input type="hidden" name="flood_ordered" value="0">
                                                    <input class="form-check-input" type="checkbox" name="flood_ordered" id="appraisal_ordered" value="1" {{ old('flood_ordered', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ml-2" for="flood_ordered">Flood Ordered</label>
                                                </div>
                                                @if ($errors->has('flood_ordered'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('flood_ordered') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_confirmed_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check {{ $errors->has('title_ordered') ? 'is-invalid' : '' }}">
                                                    <input type="hidden" name="title_ordered" value="0">
                                                    <input class="form-check-input" type="checkbox" name="title_ordered" id="title_ordered" value="1" {{ old('title_ordered', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ml-2" for="title_ordered">Title Ordered</label>
                                                </div>
                                                @if ($errors->has('closing_confirmed'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('appraisal_ordered') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.closing_confirmed_helper') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="interest_rate">{{ trans('cruds.loan.fields.interest_rate') }}</label>
                                                <input class="form-control {{ $errors->has('interest_rate') ? 'is-invalid' : '' }}" type="text" name="interest_rate" id="interest_rate" value="{{ old('interest_rate', '') }}">
                                                @if ($errors->has('interest_rate'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('interest_rate') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.interest_rate_helper') }}</span>
                                            </div>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <div class="form-group pt-4">
                                                <div class="form-check {{ $errors->has('interest_rate_locked') ? 'is-invalid' : '' }}">
                                                    <input type="hidden" name="interest_rate_locked" value="0">
                                                    <input class="form-check-input" type="checkbox" name="interest_rate_locked" id="interest_rate_locked" value="1" {{ old('interest_rate_locked', 0) == 1 ? 'checked' : '' }} onchange="interestRateLockValueChanged()">
                                                    <label class="form-check-label" for="interest_rate_locked">{{ trans('cruds.loan.fields.interest_rate_locked') }}</label>
                                                </div>
                                                @if ($errors->has('interest_rate_locked'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('interest_rate_locked') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.interest_rate_locked_helper') }}</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div id="interest-rate-expiration-container" class="form-group d-none">
                                                <label for="interest_rate_expiration">{{ trans('cruds.loan.fields.interest_rate_expiration') }}</label>
                                                <input class="form-control datepicker {{ $errors->has('interest_rate_expiration') ? 'is-invalid' : '' }}" type="text" name="interest_rate_expiration" id="interest_rate_expiration" value="{{ old('interest_rate_expiration') }}">
                                                @if ($errors->has('interest_rate_expiration'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('interest_rate_expiration') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.loan.fields.interest_rate_expiration_helper') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check {{ $errors->has('approval_required') ? 'is-invalid' : '' }}">
                                            <input type="hidden" name="approval_required" value="0">
                                            <input class="form-check-input" type="checkbox" name="approval_required" id="approval_required" value="1" {{ old('approval_required', 0) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="approval_required">{{ trans('cruds.loan.fields.approval_required') }}</label>
                                        </div>
                                        @if ($errors->has('approval_required'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('approval_required') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.loan.fields.approval_required_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check {{ $errors->has('approval_documents_signed') ? 'is-invalid' : '' }}">
                                            <input type="hidden" name="approval_documents_signed" value="0">
                                            <input class="form-check-input" type="checkbox" name="approval_documents_signed" id="approval_documents_signed" value="1" {{ old('approval_documents_signed', 0) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="approval_documents_signed">{{ trans('cruds.loan.fields.approval_documents_signed') }}</label>
                                        </div>
                                        @if ($errors->has('approval_documents_signed'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('approval_documents_signed') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.loan.fields.approval_documents_signed_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_info">{{ trans('cruds.loan.fields.contact_info') }}</label>
                                        <textarea class="form-control {{ $errors->has('contact_info') ? 'is-invalid' : '' }}" name="contact_info" id="contact_info">{{ old('contact_info') }}</textarea>
                                        @if ($errors->has('contact_info'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('contact_info') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.loan.fields.contact_info_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="notes">{{ trans('cruds.loan.fields.notes') }}</label>
                                        <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                                        @if ($errors->has('notes'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('notes') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.loan.fields.notes_helper') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group pull-right">
                                        <button class="btn btn-secondary" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                        <a href="{{ route('admin.loans.index') }}" class="btn btn-light" type="submit">
                                            {{ trans('global.cancel') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function limit(element) {
            var max_chars = 3;

            if (element.value.length > max_chars) {
                element.value = element.value.substr(0, max_chars);
            }
        }

    </script>
    </script>
@endpush
