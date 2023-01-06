<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
        $table->smallincrements('id');
		$table->string('firstname', 50);
        $table->string('lastname', 50);
        $table->string('email', 100);
        $table->string('loanid', 50)->nullable();
        $table->date("applicationdate");
        $table->smallInteger("loanamount")->nullable();
        $table->boolean('inactive')->nullable();
		$table->softDeletes();
		$table->timestamps();			
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	/*	DB::statement('ALTER TABLE customers NOCHECK CONSTRAINT all');
		
		$sm = Schema::getConnection()->getDoctrineSchemaManager();
        $table = $sm->listTableDetails('jobs'); 
        if ($table->hasForeignKey('jobs_customers_id_foreign'))  Schema::table('jobs', function (Blueprint $table) {$table->dropForeign('jobs_customers_id_foreign'); });
        $table = $sm->listTableDetails('bankaccounts'); 
        if ($table->hasForeignKey('bankaccounts_customers_id_foreign'))  Schema::table('bankaccounts', function (Blueprint $table) {$table->dropForeign('bankaccounts_customers_id_foreign'); });
        */
       Schema::dropIfExists('customers');
		
    }
}
