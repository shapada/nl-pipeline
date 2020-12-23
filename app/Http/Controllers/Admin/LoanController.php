<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoanRequest;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Loan;
use App\Models\Product;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::with(['product'])->get();

        return view('admin.loans.index', compact('loans'));
    }

    public function create()
    {
        abort_if(Gate::denies('loan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.loans.create', compact('products'));
    }

    public function store(StoreLoanRequest $request)
    {

        $form_date = $required->closing_date;
        $db_date = Carbon::parse('2021-03-01');

        var_dump( $form_date ); die();

        $form_date = Carbon::createFromFormat('m-d-Y', $closing_date );

        $form_date_string = $form_date->format('Y-m-d');

        $form_date->gt($database_date);

        $loan = Loan::create($request->all());
        return redirect()->route('admin.loans.index');
    }

    public function edit(Loan $loan)
    {
        abort_if(Gate::denies('loan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $loan->load('product');
        return view('admin.loans.edit', compact('products','loan'));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->all());
        return redirect()->route('admin.loans.index');
    }

    public function show(Loan $loan)
    {
        abort_if(Gate::denies('loan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->load('product');

        return view('admin.loans.show', compact('loan'));
    }

    public function destroy(Loan $loan)
    {
        abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoanRequest $request)
    {
        Loan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
