<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MarkLayer\Subject;

class SeedSubject extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:subject';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed Subjects table';

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
		$subjects = [
			'Toán học',
			'Văn học',
			'Anh Văn',
			'Địa lý',
			'Lịch sử',
			'Giáo dục công dân',
			'Vật lý',
			'Hóa học',
			'Tiếng Anh',
			'Giáo dục thể chất',
			'Giáo dục quốc phòng',
			'Sinh học',
		];

		collect($subjects)->each(function ($subject) {
			Subject::create([
				'subject_name'=>$subject
			]);
		});
	}
}
