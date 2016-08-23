<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Teachers\StoreRequest;
use App\Http\Requests\Teachers\UpdateRequest;
use App\Http\Requests\Teachers\DeleteRequest;

use App\Models\MarkLayer\Subject;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserLayer\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.index', [
            'teachers' => Teacher::with('subjects')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $subjects = Subject::all();
        return view('teachers.create',[
	        'subjects' => $subjects
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
	    Teacher::storeTeacher($request);

        return redirect()
            ->route('teacher::index')
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
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', [
	        'subjects' => Subject::all(),
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Teacher $teacher)
    {
	    $teacher->updateTeacher($request);

        return redirect()
            ->route("teacher::edit", $teacher)
            ->with('success',trans('general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route("teacher::index")
            ->with('success',
                trans('general.delete_success', [
                    'name' => trans('general.teacher')
                ])
            );

    }
}
