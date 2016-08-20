<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DumpConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:console';

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
     * @return mixed
     */
    public function handle()
    {
//	    for($i=1; $i<= 100; $i++){
//		    $this->info('I am here');
//		    sleep(5000);
//	    }
	    session()->put('cmd','I get here'.rand());
    }
}
