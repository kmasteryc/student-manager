<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Cl4sses\StoreRequest;
use App\Http\Requests\Cl4sses\UpdateRequest;
use App\Http\Requests\Cl4sses\DeleteRequest;

use App\Models\ClassLayer\Cl4ssType;
use App\Models\UserLayer\Paren;
use App\Models\UserLayer\Student;
use App\Models\UserLayer\Teacher;
use Illuminate\Http\Request;
use App\Models\ClassLayer\Cl4ss;
use App\Models\ClassLayer\Grade;
use App\Models\ClassLayer\Scholastic;
use App\Models\ClassLayer\Semester;
use App\User;

class Cl4ssController extends Controller
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
		$q_cl4ss_type = request()->query('filter_cl4ss_type');
		$q_teacher_name = request()->query('filter_teacher_name');

		$cl4sses = Cl4ss::search($q_scholastic, $q_sesmester, $q_grade, $q_cl4ss_type, $q_teacher_name)
			->loadRelation()
			->orderBy('id', 'DESC')
			->paginate(10);

		$cl4sses->setPath(request()->getUri());

		return view('cl4sses.index', [
			'result_cl4sses' => $cl4sses,
			'scholastics' => Scholastic::all(),
			'semesters'   => Semester::all(),
			'grades'      => Grade::all(),
			'cl4ss_types'     => Cl4ssType::all()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$cl4ss_types = Cl4ssType::all();
		$grades = Grade::all();
		$semesters = Semester::all();
		$scholastics = Scholastic::all();
		$parents = Paren::all();
		$teachers = Teacher::all();

		return view('cl4sses.create', compact('grades', 'semesters', 'scholastics', 'teachers', 'parents', 'cl4ss_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRequest $request)
	{
		Cl4ss::create($request->all());

		return redirect()
			->route('cl4ss::create')
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
	public function edit(Cl4ss $cl4ss)
	{
		$grades = Grade::all();
		$semesters = Semester::all();
		$scholastics = Scholastic::all();
		$users = User::all();

		return view('cl4sses.edit', compact('cl4ss', 'grades', 'semesters', 'scholastics', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request, Cl4ss $cl4ss)
	{
		$cl4ss->update($request->all());

		return redirect()
			->route("cl4ss::edit", $cl4ss)
			->with('success', trans('general.update_success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request, Cl4ss $cl4ss)
	{
		$cl4ss->subjects()->detach();
		$cl4ss->users()->detach();
		$cl4ss->delete();

		return redirect()
			->route("cl4ss::index")
			->with('success', trans('general.delete_success'));

	}

	public function addStudent(Cl4ss $cl4ss)
	{
		$cur_students = $cl4ss->students()->with('parents')->get();
//	    dd($cur_students);
		$all_students = Student::whereNotIn('id', $cur_students->pluck('id'))->with('parents')->get();

		return view('cl4sses.add_student', [
			'cl4ss'        => $cl4ss,
			'all_students' => $all_students,
			'cur_students' => $cur_students,
		]);
	}

	public function updateStudent(Request $request, Cl4ss $cl4ss)
	{
		$students = $request->students !== null ? $request->students : [];
		$cl4ss->students()->sync($students);

		return redirect()
			->route('cl4ss::add-student', $cl4ss)
			->with('success', trans('general.update_success'));
	}
}
