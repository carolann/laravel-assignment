<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
        $table->smallincrements('id');
        $table->smallinteger("customer_id");
		$table->string('company', 50);
        $table->string('position', 50)->nullable();
        $table->integer('salary');
        $table->date("startdate");
		$table->softDeletes();
		$table->timestamps();	
        
        $table->index('customer_id', 'idx_jobs_customer_id');

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
		
		/*$sm = Schema::getConnection()->getDoctrineSchemaManager();
        $table = $sm->listTableDetails('jobs'); 
        dd($table);
        if ($table->hasForeignKey('jobs_customers_id_foreign'))  Schema::table('jobs', function (Blueprint $table) {$table->dropForeign('jobs_customers_id_foreign'); });
        */
       Schema::dropIfExists('jobs');
		
    }
}
