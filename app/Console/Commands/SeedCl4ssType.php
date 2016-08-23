<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClassLayer\Cl4ssType;

class SeedCl4ssType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:cl4ss-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Cl4ss type';

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

		    $cl4ss_types = [
			    'A','B','C'
		    ];
		    collect($cl4ss_types)->each(function($cl4ss_type){
			    Cl4ssType::create([
				    'cl4ss_type_name'=>$cl4ss_type
			    ]);
		    });
		    
	    });
    }
}
