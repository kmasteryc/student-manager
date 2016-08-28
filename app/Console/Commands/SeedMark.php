<?php

namespace App\Console\Commands;

use App\Models\MarkLayer\Cl4ssSubject;
use App\Models\MarkLayer\Mark;
use App\Models\MarkLayer\MarkType;
use Illuminate\Console\Command;

class SeedMark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:mark';

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
	    $this->info("START SEEDING MARKS TABLE");
	    $i = 0;

	    \DB::transaction(function() use (&$i){
		    $cl4ss_subjects = Cl4ssSubject::whereHas('cl4ss',function($q){
			    return $q->where('cl4ss_state',1);
		    })->get();

		    $mark_types = MarkType::all();

		    foreach ($cl4ss_subjects as $cl4ss_subject){
			    foreach ($mark_types as $mark_type){

				    foreach ($cl4ss_subject->cl4ss->students as $student){
					    $this->info("Record $i..");
					    Mark::create([
						    'mark_point' => rand(0,10),
						    'mark_type_id' => $mark_type->id,
						    'cl4ss_subject_id' => $cl4ss_subject->id,
						    'student_id' => $student->id
					    ]);
					    $i++;
				    }
			    }
		    }
	    });

	    $this->info("FINISH ADD $i MARK RECORDS");
    }
}
