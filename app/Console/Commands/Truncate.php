<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class Truncate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate table for new seeding';

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
	    $this->info("--- START TRUNCATE ---");

	    DB::beginTransaction();

	    DB::raw("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("cl4ss_student")->truncate();
        DB::table("cl4ss_subject")->truncate();
        DB::table("cl4ss_types")->truncate();
//        DB::table("marks")->truncate();
//        DB::table("mark_types")->truncate();
        DB::table("parent_student")->truncate();
        DB::table("subjects")->truncate();
        DB::table("subject_user")->truncate();
        DB::table("users")->truncate();
	    DB::raw("SET FOREIGN_KEY_CHECKS=1;");
	    
	    DB::commit();

	    $this->info("--- TRUNCATE COMPLETE! ---");
    }
}
