<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::all();
        $users = User::all();
        $books = Book::all();

        return view('loans.index', compact('loans', 'users', 'books'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        $books = Book::all();

        return view('loans.create', compact('users', 'books'));
    }

    public function store(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->validated());

        return redirect()->route('loans.index');
    }

    public function show(Loan $loan)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id');
        $books = Book::pluck('title', 'id');

        $loan->load('users', 'books');

        return view('loans.edit', compact('loan', 'users', 'books'));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->validated());
        $loan->users()->sync($request->input('users', []));
        $loan->books()->sync($request->input('books', []));

        return redirect()->route('loans.index');
    }

    public function destroy(Loan $loan)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return redirect()->route('loans.index');
    }
}
