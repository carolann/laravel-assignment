<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Customer;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\Job;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(1)->has(
            BankAccount::factory()->has(
                Transaction::factory()->count(50)
            )->count(1)
        )->hasJob(1)->create();
        Customer::factory()->count(1)->hasJob(1)->create();
    }
}
