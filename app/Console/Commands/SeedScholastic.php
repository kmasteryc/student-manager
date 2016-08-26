<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Scholastic;
use Illuminate\Console\Command;

class SeedScholastic extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:scholastic';

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
		$start = 2012;
		$max = 2016;
		for ($i = $start; $i <= $max; $i++) {
			Scholastic::create([
				'scholastic_from' => $i,
				'scholastic_to' => $i+1,
			]);
		}
	}
}
