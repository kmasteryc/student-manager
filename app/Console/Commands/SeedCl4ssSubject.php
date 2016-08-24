<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\Subject;
use Illuminate\Console\Command;

class SeedCl4ssSubject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:cl4ss-subject';

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
	    $this->info("--- START ATTACH SUBJECTS TO CLASS ---");
	    \DB::transaction(function(){

		    $cl4sses = Cl4ss::all();
		    $cl4sses->each(function($cl4ss){
			    $some_subject = Subject::inRandomOrder()->take(8)->get();
				foreach ($some_subject as $subject){
					$rand_teacher = $subject->teachers()->inRandomOrder()->first();
					$cl4ss->subjects()->attach($subject,['teacher_id'=>$rand_teacher->id]);
				}
		    });

	    });
	    $this->info("--- DONE ---");
    }
}
