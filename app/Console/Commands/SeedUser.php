<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Cl4ssType;
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

class SeedUser extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:user';

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
		\DB::beginTransaction();

		$faker = Factory::create();
		$cl4ss_types = Cl4ssType::all();

		$this->info("----- START SEEDING USERS -----");
		$this->info("Create some teachers...");

		for ($i = 1; $i<=40; $i++){
			$teacher = Teacher::create([
				'user_name'      => $faker->userName,
				'first_name'     => $faker->firstName,
				'last_name'      => $faker->lastName,
				'email'          => $faker->safeEmail,
				'role_id'        => 3,
				'password'       => bcrypt(123456),
				'birthday'       => $faker->date('Y-m-d'),
				'info'           => $faker->address,
				'remember_token' => str_random(10),
			]);
			$this->info("Sync subjects to teacher....");
			$subject_ids = Subject::inRandomOrder()->take(rand(1,3))->pluck('id')->toArray();
			$teacher->subjects()->sync($subject_ids);
		}

		foreach ($cl4ss_types as $cl4ss_type) {
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
					'role_id'        => 2,
					'password'       => bcrypt(123456),
					'birthday'       => $faker->date('Y-m-d'),
					'info'           => $faker->address,
					'remember_token' => str_random(10),
				]));
				$user_ids[] = $student->id;
			}

//			$all_cl4sses = Cl4ss::where('cl4ss_name', $cl4ss_name)
//				->first()
//				->getSerialCl4ss()
//				->get();
			$all_cl4sses = $cl4ss_type->cl4sses()
				->first()
				->getSerialCl4ss()
				->get();

			$all_cl4sses->each(function ($cl4ss) use ($user_ids, $faker) {

				$this->info("Attach teacher to class....");
				$cl4ss->teacher_id = Teacher::inRandomOrder()->first()->id;

				$this->info("Sync students to class....");
				$cl4ss->students()->sync($user_ids);

				$cl4ss->save();
			});



		}

		\DB::commit();

		$this->info("DONE!");
	}
}
