<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
        $table->smallincrements('id');
        $table->smallinteger("bank_account_id");
        $table->integer('transactionAmount');
        $table->date("transactionDate");
		 
        $table->index('bank_account_id', 'idx_transactions_bank_account_id');

		$table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('cascade');


        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		/*DB::statement('ALTER TABLE jobs NOCHECK CONSTRAINT all');
		
		$sm = Schema::getConnection()->getDoctrineSchemaManager();
        $table = $sm->listTableDetails('transactions'); 
        if ($table->hasForeignKey('transactions_bank_accounts_id_foreign'))  Schema::table('transactions', function (Blueprint $table) {$table->dropForeign('transactions_bank_accounts_id_foreign'); });
       */
        Schema::dropIfExists('transactions');
		
    }
}
