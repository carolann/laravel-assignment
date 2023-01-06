<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     protected function getArguments()
     {
         return [
             ['name', InputArgument::REQUIRED, 'The name of the database'],
         ];
     }


    protected $signature = 'make:database';
    protected $name = "make:database";
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $dbName= config("database.connections.mysql.database");
         config(["database.connections.mysql.database" => NULL]);

        DB::statement("CREATE DATABASE IF NOT EXISTS $dbName");
        config(["database.connections.mysql.database" => $dbName]);
        return 0;
    }
}
