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
    public function all($id)
    {
        return \App\Models\Customer::find($id)->load("transactions");
    }

    /*
        Index returns the loan record and and customer form
        Route:  customer/#id#
    */
    public function index($id){
        $customer=loan::GetLoanData($id);
        return view('customer', compact('customer'));
    }

    
    /*
        getjson returns the loan record as a json string
        Route:  api/customer/#id#
    */
    public function getjson($id)
    {
        return response()->json(\app\classes\loan::GetLoanData($id), 200);
    }

    
    /*
        UpdateLoan saves the new loan amount to the customer record and returns the loan record and and customer form
        Route: POST::loanamountupdate  customer/#id#
    */
    public function LoanAmountUpdate(Request $request){
        $customer=\App\Models\Customer::find($request->input("id"));
        $customer->loanamount=$request->input("loanamount");
           
        $customer->update();
        $customer=loan::GetLoanData($request->input("id"));
        return back()->withInput();
    }

}
