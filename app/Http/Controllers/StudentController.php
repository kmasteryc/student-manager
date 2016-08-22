<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StoreRequest;
use App\Http\Requests\Students\UpdateRequest;
use App\Http\Requests\Students\DeleteRequest;

use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Grade;
use App\Models\ClassLayer\Semester;
use App\Models\MarkLayer\Subject;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserLayer\Paren;
use App\Models\UserLayer\Student;

class StudentController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$q_sesmester = request()->query('filter_semester');
		$q_scholastic = request()->query('filter_scholastic');
		$q_grade = request()->query('filter_grade');
		$q_cl4ss = request()->query('filter_cl4ss');
		$q_student_name = request()->query('filter_student_name');

		$students = Student::search($q_scholastic, $q_sesmester, $q_grade, $q_cl4ss, $q_student_name)
			->with('parents', 'cl4sses')
			->paginate(10);
		$students->setPath(request()->getUri());

		return view('students.index', [
			'students'           => $students,
			'scholastics' => Scholastic::all(),
			'semesters'   => Semester::all(),
			'grades'      => Grade::all(),
			'cl4sses'     => Cl4ss::all()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$parents = Paren::all();
		$cl4sses = Cl4ss::all();

		return view('students.create', [
			'parents' => $parents,
			'cl4sses' => $cl4sses,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRequest $request)
	{
		Student::storeStudent($request);

		return redirect()
			->route('student::index')
			->with('success', trans('general.create_success'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Student $student)
	{
		return view('students.edit', [
			'parents' => Paren::all(),
			'cl4sses' => Cl4ss::all(),
			'student' => $student,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request, Student $student)
	{
		$student->updateStudent($request);

		return redirect()
			->route("student::edit", $student)
			->with('success', trans('general.update_success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request, Student $student)
	{
		$student->delete();

		return redirect()
			->route("student::index")
			->with('success', trans('general.delete_success'));
	}
}
