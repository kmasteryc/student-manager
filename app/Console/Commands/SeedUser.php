<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use Illuminate\Console\Command;
use Faker\Factory;

use Illuminate\Database\Seeder;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\Models\ClassLayer\Grade;

use App\Models\UserLayer\Teacher;
use App\Models\UserLayer\Student;
use App\Models\UserLayer\Paren;

class SeedUser extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:seed-user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed users table';

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
//		\DB::table('users')->truncate();
//		\DB::table('class_student')->truncate();
//		\DB::table('parent_student')->truncate();
		\DB::beginTransaction();
		$faker = Factory::create();
		$arr_class = ['A', 'B', 'C'];

		foreach ($arr_class as $cl4ss_name) {
			$user_ids = [];
			for ($i = 1; $i <= 50; $i++) {
				$data = [
					'user_name'      => $faker->userName,
					'first_name'     => $faker->firstName,
					'last_name'      => $faker->lastName,
					'email'          => $faker->safeEmail,
					'password'       => bcrypt(123456),
					'birthday'       => $faker->date('Y-m-d'),
					'info'           => $faker->address,
					'remember_token' => str_random(10),
				];

				$student = Student::create($data);

				$student->parents()->save(Paren::create([
					'user_name'      => $faker->userName,
					'first_name'     => $faker->firstName,
					'last_name'      => $faker->lastName,
					'email'          => $faker->safeEmail,
					'password'       => bcrypt(123456),
					'birthday'       => $faker->date('Y-m-d'),
					'info'           => $faker->address,
					'remember_token' => str_random(10),
				]));
				$user_ids[] = $student->id;
			}

			$all_cl4sses = Cl4ss::where('cl4ss_name', $cl4ss_name)
				->first()
				->getSerialCl4ss()
				->get();

			$all_cl4sses->each(function ($cl4ss) use ($user_ids) {
				$cl4ss->students()->sync($user_ids);
			});
		}

		\DB::commit();
	}
}
