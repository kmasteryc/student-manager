<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Grade;
use Illuminate\Console\Command;

class SeedGrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:grade';

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
        $grades = [6,7,8,9];
	    collect($grades)->each(function ($grade) {
		    Grade::create([
			    'grade_name'=>$grade
		    ]);
	    });
    }
}
