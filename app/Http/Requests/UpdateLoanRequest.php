<?php

namespace App\Http\Requests;

use App\Models\Loan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLoanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('loan_edit');
    }

    public function rules()
    {
        return [
            'loan_number'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:loans,loan_number,' . request()->route('loan')->id,
            ],
            'customer'                 => [
                'string',
                'required',
            ],
            'lender'                   => [
                'string',
                'nullable',
            ],
            'processor'                => [
                'string',
                'min:3',
                'max:3',
                'required',
            ],
            'services_ordereds.*'      => [
                'integer',
            ],
            'services_ordereds'        => [
                'array',
            ],
            'closing_date'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'closing_time'             => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'closing_location'         => [
                'string',
                'nullable',
            ],
            'title_company'            => [
                'string',
                'nullable',
            ],
            'interest_rate'            => [
                'string',
                'nullable',
            ],
            'interest_rate_expiration' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'address'                  => [
                'string',
                'nullable',
            ],
        ];
    }
}
