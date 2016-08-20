<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cl4sses\StoreRequest;
use App\Http\Requests\Cl4sses\UpdateRequest;
use App\Http\Requests\Cl4sses\DeleteRequest;

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
        return view('cl4sses.index', [
            'cl4sses' => Cl4ss::with('scholastic','semester','grade')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $semesters = Semester::all();
        $scholastics = Scholastic::all();
        $users = User::all();

        return view('cl4sses.create', compact('grades','semesters','scholastics','users'));
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

        return view('cl4sses.edit', compact('cl4ss','grades','semesters','scholastics','users'));
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

    public function addStudent(Cl4ss $cl4ss){
        $cur_students = $cl4ss->users;
        $all_students = User::where('role_id',1)->whereNotIn('id', $cur_students->pluck('id'))->get();
        return view('cl4sses.add_student',[
            'cl4ss' => $cl4ss,
            'all_students'=>$all_students,
            'cur_students'=>$cur_students,
        ]);
    }

    public function updateStudent(Request $request, Cl4ss $cl4ss){
        $students = $request->students !== null ? $request->students : [] ;
        $cl4ss->users()->sync($students);
        return redirect()
            ->route('cl4ss::add-student',$cl4ss)
            ->with('success',trans('general.update_success'));
    }
}
