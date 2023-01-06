<?php 
namespace app\classes;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\BankAccount;
class loan {
    /*
        GetLoanData is used by the api as well as the customer form. 
        This runs a query that gets a customer record, their job record, and totals the transactions if there is a bank account
        This will return a 404 error if there is no data.
    */
    public static function GetLoanData($id){
        $balance=BankAccount::select(["customer_id", DB::raw("sum(transactionamount / 100) as balance")])->join("transactions",'bank_accounts.id','=','transactions.bank_account_id')->groupBy("transactions.bank_account_id");
        $data=Customer::select(["customers.id", "firstname","lastname","loanamount", "salary","balance"])
        ->leftJoin("jobs","customers.id",'=','jobs.customer_id')
        ->leftJoinSub($balance, 'balance', function ($join) {
            $join->on('customers.id', '=', 'balance.customer_id');
        })->where('customers.id','=',$id)->get();
        if(count($data)==0) abort(404);
        return $data;
    }
}