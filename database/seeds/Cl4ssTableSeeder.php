<?php

use Illuminate\Database\Seeder;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\Models\ClassLayer\Grade;
use App\Models\ClassLayer\Cl4ss;

use App\Models\UserLayer\Teacher;
use App\Models\UserLayer\Paren;
class Cl4ssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$arrClass = ['A','B','C'];
		foreach (Scholastic::all() as $scholastic){
			foreach (Semester::all() as $semester){
				foreach (Grade::all() as $grade){
					foreach ($arrClass as $cl4ss_name){
						$cl4ss = new Cl4ss;
						$cl4ss->scholastic_id = $scholastic->id;
						$cl4ss->semester_id = $semester->id;
						$cl4ss->grade_id = $grade->id;
//						$cl4ss->parent_id = Paren::inRandomOrder()->first()->id;
//						$cl4ss->teacher_id = Teacher::inRandomOrder()->first()->id;
						$cl4ss->cl4ss_name = $cl4ss_name;
						$cl4ss->save();
					}
				}
			}
		}
	}
}
