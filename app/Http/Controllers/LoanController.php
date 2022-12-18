<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::all();
        $users = User::all();
        $books = Book::all();

        return view('loans.index', compact('loans', 'users', 'books'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        $books = Book::all()->where('status', '==', '0');

        $loan_date = Carbon::now()->timezone('Asia/Phnom_Penh')->format('Y-m-d');
        $return_date = Carbon::now()->timezone('Asia/Phnom_Penh')->addDays(7)->format('Y-m-d');

        return view('loans.create', compact('users', 'books', 'loan_date', 'return_date'));
    }

    public function store(StoreLoanRequest $request)
    {
        $book_id = $request->input('book_id');
        $book = Book::all()->where('id', '=', $book_id);
        foreach ($book as $b){
            $b->status = 1;
        }
        $b->update();
        $loan = Loan::create($request->validated());

        return redirect()->route('loans.index');
    }

    public function show(Loan $loan)
    {
        //
    }

    public function edit(Loan $loan)
    {
        //
    }

    public function update(Request $request, Loan $loan)
    {
        //
    }

    public function destroy(Loan $loan)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return redirect()->route('loans.index');
    }

    public function markasdone(Loan $loan)
    {
        $book_id = $loan->book_id;
        $book = Book::all()->where('id', '=', $book_id);
        foreach ($book as $b){
            $b->status = 0;
        }
        $b->update();

        $loan->status = 0;
        $loan->save();

        return redirect()->route('loans.index');
    }
}
