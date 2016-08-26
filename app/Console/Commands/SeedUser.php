<?php

namespace App\Console\Commands;

use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Cl4ssType;
use App\Models\MarkLayer\Subject;
use App\User;
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

	private $last_student = 1;
	private $last_parent = 1;
	private $last_teacher = 1;
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

		for ($i = 1; $i <= 40; $i++) {
			$teacher = Teacher::create($this->templateTeacher());
			$this->info("Sync subjects to teacher....");
			$subject_ids = Subject::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray();
			$teacher->subjects()->sync($subject_ids);
			$this->last_teacher++;
		}

		foreach ($cl4ss_types as $cl4ss_type) {

			$cl4ss_first = $cl4ss_type->cl4sses->first();
			$user_ids = [];

			for ($i = 1; $i <= 50; $i++) {
				$student = Student::create($this->templateStudent());
				$student->parents()->save(Paren::create($this->templateParent()));
				$user_ids[] = $student->id;
				$this->last_student++;
				$this->last_parent++;
			}

			$serial_cl4sses = $cl4ss_first->getSerialCl4ss()->get();
			$serial_cl4sses->each(function ($cl4ss) use ($user_ids, $faker) {

				$this->info("Attach teacher, students to class...." . $cl4ss->detail_name);
				$cl4ss->teacher_id = Teacher::inRandomOrder()->first()->id;

				$cl4ss->students()->sync($user_ids);
				$cl4ss->save();
			});
		}

		// Create admin
		User::create($this->templateAdmin());
		\DB::commit();

		$this->info("DONE!");
	}

	private function templateAdmin()
	{
		$faker = Factory::create();

		return [
			'username'       => "admin",
			'first_name'     => $faker->firstName,
			'last_name'      => $faker->lastName,
			'email'          => $faker->safeEmail,
			'role_id'        => 4,
			'password'       => bcrypt(123456),
			'birthday'       => $faker->date('Y-m-d'),
			'info'           => $faker->address,
			'remember_token' => str_random(10),
		];
	}

	private function templateParent()
	{
		$faker = Factory::create();

		return [
			'username'       => "parent{$this->last_parent}",
			'first_name'     => $faker->firstName,
			'last_name'      => $faker->lastName,
			'email'          => $faker->safeEmail,
			'role_id'        => 2,
			'password'       => bcrypt(123456),
			'birthday'       => $faker->date('Y-m-d'),
			'info'           => $faker->address,
			'remember_token' => str_random(10),
		];
	}

	private function templateTeacher()
	{
		$faker = Factory::create();

		return [
			'username'       => "teacher{$this->last_teacher}",
			'first_name'     => $faker->firstName,
			'last_name'      => $faker->lastName,
			'email'          => $faker->safeEmail,
			'role_id'        => 3,
			'password'       => bcrypt(123456),
			'birthday'       => $faker->date('Y-m-d'),
			'info'           => $faker->address,
			'remember_token' => str_random(10),
		];
	}

	private function templateStudent()
	{
		$faker = Factory::create();

		return [
			'username'       => "student{$this->last_student}",
			'first_name'     => $faker->firstName,
			'last_name'      => $faker->lastName,
			'email'          => $faker->safeEmail,
			'password'       => bcrypt(123456),
			'birthday'       => $faker->date('Y-m-d'),
			'info'           => $faker->address,
			'remember_token' => str_random(10),
		];
	}


}
