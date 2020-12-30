<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\Admin\LoanResource;
use App\Models\Loan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanApiController extends Controller
{
    public function index( Request $request)
    {

        if ( $request->input('client') ) {
    	    return Loan::select('id', 'loan_number', 'lender', 'customer')->get();
        }
        
        //abort_if(Gate::denies('loan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $columns = ['loan_number', 'lender', 'customer'];

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Loan::select('id', 'loan_number', 'lender', 'customer')->orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('lender', 'like', '%' . $searchValue . '%')
                ->orWhere('customer', 'like', '%' . $searchValue . '%');
            });
        }

         $loans = $query->paginate($length);
        return ['data' => $loans, 'draw' => $request->input('draw')];
    }

    public function store(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->all());
        $loan->services_ordereds()->sync($request->input('service', []));

        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Loan $loan)
    {
        abort_if(Gate::denies('loan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanResource($loan->load(['product', 'service']));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->all());
        $loan->services_ordereds()->sync($request->input('service', []));

        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Loan $loan)
    {
        abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}