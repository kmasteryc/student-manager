<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\Subject;
use Illuminate\Console\Command;
use Faker\Factory;

use Illuminate\Database\Seeder;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\Models\ClassLayer\Grade;

use App\Models\UserLayer\Teacher;
use App\Models\UserLayer\Student;
use App\Models\UserLayer\Paren;


class ReSyncClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resync:cl4ss';

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
		$cl4sses = Cl4ss::where('parent_id',0)->orWhere('teacher_id',0)->get();
	    $this->info("FOUND {$cl4sses->count()} CLASSES UNSYNC!. START NOW...");
	    if ($cl4sses->count()>0){
		    $cl4sses->each(function($cl4ss){
			    $rand_teacher = Teacher::inRandomOrder()->first();
			    $rand_parent = Paren::inRandomOrder()->first();
			    $cl4ss->parent_id = $rand_parent->id;
			    $cl4ss->teacher_id = $rand_teacher->id;
			    $cl4ss->save();
		    });
	    }

	    $this->info("DONE!");
    }
}
