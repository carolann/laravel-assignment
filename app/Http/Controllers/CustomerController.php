<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\classes\loan;

class CustomerController extends Controller
{
    //
    /*
        All returns all the transactions for a customer
        Route:  customertransactions/#id#
    */
    public function __construct()
    {
        $this->middleware('auth');
		
    }
    public function index()
    {
        
        return \App\Models\Customer::all()->load('job');
     //  return \App\Models\Customer::has("transactions")->get()->load("transactions");
    }

    public function create()
    {
        //
    }

    /*
        Index returns the loan record and and customer form
        Route:  customer/#id#
    */
    public function show($id){
        $customer=loan::GetLoanData($id);
        return view('customer', compact('customer'));
    }

        
    /*
        UpdateLoan saves the new loan amount to the customer record and returns the loan record and and customer form
        Route: POST::loanamountupdate  customer/#id#
    */
    public function store(Request $request){
        
    }
    public function update(Request $request){
        $customer=\App\Models\Customer::find($request->input("id"));
        $customer->loanamount=$request->input("loanamount");
        $customer->update();
        $customer=loan::GetLoanData($request->input("id"));
        return back()->withInput();
    }

    public function destroy($id)
    {
        //
    }
}
