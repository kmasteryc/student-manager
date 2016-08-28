<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Students\StoreRequest;
use App\Http\Requests\Students\UpdateRequest;
use App\Http\Requests\Students\DeleteRequest;

use App\Models\UserLayer\Student;

class StudentController extends Controller
{
	public function index()
	{
		$param['q_sesmester'] = request()->query('q_sesmester');
		$param['q_scholastic'] = request()->query('q_scholastic');
		$param['q_grade'] = request()->query('q_grade');
		$param['q_cl4ss_type'] = request()->query('q_cl4ss_type');
		$param['q_student_name'] = request()->query('q_student_name');

		$options = [
			'paginate' => [
				'url' => request()->getUri(),
				'perpage' => 10,
			],
		];

		$students = $this->repo('student')->search($param, $options);

		return view('admin.students.index', [
			'students'    => $students,
			'scholastics' => $this->repo('scholastic')->get(),
			'semesters'   => $this->repo('semester')->get(),
			'grades'      => $this->repo('grade')->get(),
			'cl4ss_types' => $this->repo('cl4ss_type')->get(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.students.create', [
			'parents' => $this->repo('parent')->get(),
			'cl4sses' => $this->repo('class')->get(),
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
			->route('admin::student::index')
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
		return view('admin.students.edit', [
			'parents' => $this->repo('parent')->get(),
			'cl4sses' => $this->repo('class')->get(),
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
			->route("admin::student::edit", $student)
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
			->route("admin::student::index")
			->with('success', trans('general.delete_success'));
	}
}
