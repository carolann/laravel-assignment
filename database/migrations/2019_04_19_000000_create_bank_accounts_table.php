<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebankaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
        $table->smallincrements('id');
        $table->smallinteger("customer_id");
		$table->softDeletes();
		$table->timestamps();	
        
        $table->index('customer_id', 'idx_bank_accounts_customer_id');

		$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');


        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		/*DB::statement('ALTER TABLE bank_accounts NOCHECK CONSTRAINT all');
		
		$sm = Schema::getConnection()->getDoctrineSchemaManager();
        $table = $sm->listTableDetails('bank_accounts'); 
        if ($table->hasForeignKey('bank_accounts_customers_id_foreign'))  Schema::table('bank_accounts', function (Blueprint $table) {$table->dropForeign('bank_accounts_customers_id_foreign'); });
        if ($table->hasForeignKey('transactions_bank_accounts_id_foreign'))  Schema::table('transactions', function (Blueprint $table) {$table->dropForeign('transactions_bank_accounts_id_foreign'); });
       */
        Schema::dropIfExists('bank_accounts');
		
    }
}
