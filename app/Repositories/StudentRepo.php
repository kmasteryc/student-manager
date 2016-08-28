<?php
/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 28/08/2016
 * Time: 13:00
 */

namespace App\Repositories;

use App\Models\UserLayer\Student;

class StudentRepo
{

	public function get()
	{
		return Student::orderBy('last_name', 'ASC')->get();
	}

	public static function search(array $conditions, array $options = [])
	{
		$q_sesmester = $conditions['q_sesmester'];
		$q_scholastic = $conditions['q_scholastic'];
		$q_grade = $conditions['q_grade'];
		$q_cl4ss_type = $conditions['q_cl4ss_type'];
		$q_student_name = $conditions['q_student_name'];

		$students = Student::whereHas('cl4sses', function ($q) use ($q_cl4ss_type, $q_grade, $q_scholastic, $q_sesmester) {

			if ($q_scholastic) {
				$q->whereHas('scholastic', function ($qq) use ($q_scholastic) {
					return $qq->where('id', $q_scholastic);
				});
			}

			if ($q_sesmester) {
				$q->whereHas('semester', function ($qq) use ($q_sesmester) {
					return $qq->where('id', $q_sesmester);
				});
			}

			if ($q_grade) {
				$q->whereHas('grade', function ($qq) use ($q_grade) {
					return $qq->where('id', $q_grade);
				});
			}

			if ($q_cl4ss_type) {
				$q->where('cl4ss_type_id', $q_cl4ss_type);
			}

		});

		if ($q_student_name) {
			$words = explode(' ', $q_student_name);
			$students->whereIn('first_name', $words)->orWhereIn('last_name', $words);
		}

		$students->with(['parents', 'cl4sses']);

		if ($options['paginate']) {
			$students = $students->paginate($options['paginate']['perpage'])
				->setPath($options['paginate']['url']);

			return $students;
		}

		return $students->get();

	}
}