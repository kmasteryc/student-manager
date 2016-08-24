<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\Models\ClassLayer\Grade;
use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Cl4ssType;

class SeedCl4ss extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:cl4ss';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed cl4sses table';

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
		\DB::transaction(function (){

			$cl4ss_types = Cl4ssType::all();
			if ($cl4ss_types->count() == 0){
				\Artisan::call('seed:cl4ss-type');
			}
			$cl4ss_types = Cl4ssType::all();

			foreach (Scholastic::all() as $scholastic) {
				foreach (Semester::all() as $semester) {
					foreach (Grade::all() as $grade) {
						foreach ($cl4ss_types as $cl4ss_type) {
							$cl4ss_type->cl4sses()->save(new Cl4ss([
								'scholastic_id' => $scholastic->id,
								'semester_id'   => $semester->id,
								'grade_id'      => $grade->id,
							]));
						}
					}
				}
			}

		});
	}
}
