<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Semester;
use Illuminate\Console\Command;

class SeedSemester extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:semester';

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
        $semesters = ['Kì 1','Kì 2'];
	    collect($semesters)->each(function ($semester) {
		    Semester::create([
			    'semester_name' => $semester
		    ]);
	    });
    }
}
