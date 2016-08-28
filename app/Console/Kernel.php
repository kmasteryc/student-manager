<?php

namespace App\Console;

use App\Console\Commands\ReSyncClass;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		Commands\Inspire::class,
		Commands\ReSyncClass::class,
		Commands\SetActiveClass::class,
		Commands\Truncate::class,
		
		Commands\SeedAll::class,
		Commands\SeedUser::class,
		Commands\SeedRole::class,
		Commands\SeedSubject::class,
		Commands\SeedCl4ssType::class,
		Commands\SeedCl4ss::class,
		Commands\SeedMarkType::class,
		Commands\SeedGrade::class,
		Commands\SeedScholastic::class,
		Commands\SeedSemester::class,
		Commands\SeedCl4ssSubject::class,
		Commands\SeedMark::class,
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		// $schedule->command('inspire')
		//          ->hourly();
	}
}
