<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use Illuminate\Console\Command;

class SetActiveClass extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'resync:set-active-class';

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
		$lastest_scholastic = Scholastic::orderBy('scholastic_to', 'DESC')->first();
		$lastest_semester = Semester::orderBy('id', 'DESC')->first();

		$cl4sses = Cl4ss::where('scholastic_id', $lastest_scholastic->id)
			->where('semester_id', $lastest_semester->id)
			->get();

		$cl4sses->each(function($cl4ss){
			$cl4ss->cl4ss_state = 2;
			$cl4ss->save();
		});
		$this->info("SET ACTIVE CLASS DONE!");
	}
}
