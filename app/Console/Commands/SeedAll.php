<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
class SeedAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:all';

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
	    \DB::transaction(function(){
		    $this->info("--- SEED ROLE TYPE ---");
		    $this->call('seed:role');

		    $this->info("--- SEED MARK TYPE ---");
		    $this->call('seed:mark-type');

		    $this->info("--- SEED GRADE ---");
		    $this->call('seed:grade');

		    $this->info("--- SEED SCHOLASTIC ---");
		    $this->call('seed:scholastic');

		    $this->info("--- SEED SEMESTER ---");
		    $this->call('seed:semester');

		    $this->info("--- SEED CLASS TYPE ---");
		    $this->call('seed:cl4ss-type');

		    $this->info("--- SEED CLASS ---");
		    $this->call('seed:cl4ss');

		    $this->info("--- SEED SUBJECT ---");
		    $this->call('seed:subject');

		    $this->info("--- SEED USER ---");
		    $this->call('seed:user');

		    $this->info("--- SEED SUBJECT ---");
		    $this->call('seed:cl4ss-subject');

		    $this->info("--- RESYNC CLASS ---");
		    $this->call('resync:cl4ss');
	    });
    }
}
