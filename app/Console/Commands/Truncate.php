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

		DB::raw("SET FOREIGN_KEY_CHECKS=0");
		
		DB::beginTransaction();
		DB::table("cl4sses")->truncate();
		DB::table("cl4ss_types")->truncate();
		DB::table("marks")->truncate();
		DB::table("users")->truncate();

		DB::commit();

		DB::raw("SET FOREIGN_KEY_CHECKS=0");

		$this->info("--- TRUNCATE COMPLETE! ---");
	}
}
