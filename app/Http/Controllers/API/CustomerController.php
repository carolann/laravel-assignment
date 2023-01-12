<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use app\classes\loan;
use Validator;

class CustomerController extends BaseController
{
    //
    /*
        All returns all the transactions for a customer
        Route:  customertransactions/#id#
    */
    public function index()
    {
        return \App\Models\Customer::has("transactions")->get()->load("transactions");
        return response()->json(\App\Models\Customer::has("transactions")->get()->load("transactions"));     
    }

    /*
        getjson returns the loan record as a json string
        Route:  api/customer/#id#
    */
    public function show($id){
        return \app\classes\loan::GetLoanData($id);
        return response()->json(\app\classes\loan::GetLoanData($id), 200);
    }
    public function store(Request $request){
        
    }
   
    public function update(Request $request){
        
    }
 
}
