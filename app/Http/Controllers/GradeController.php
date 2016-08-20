<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grades\StoreRequest;
use App\Http\Requests\Grades\UpdateRequest;
use App\Http\Requests\Grades\DeleteRequest;

use Illuminate\Http\Request;
use App\User;
use App\Models\ClassLayer\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        var_dump(request()->server());
//        exit();
        return view('grades.index', [
            'grades' => Grade::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Grade::create($request->all());

        return redirect()
            ->route('grade::create')
            ->with('success',
                trans('general.create_success', [
                    'name' => trans('general.grade')
                ])
            );
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
    public function edit(Grade $grade)
    {
        return view('grades.edit', [
            'grade' => $grade
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Grade $grade)
    {
        $grade->update($request->all());
        return redirect()
            ->route("grade::edit", $grade)
            ->with('success',
                trans('general.update_success', [
                    'name' => trans('general.grade')
                ])
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Grade $grade)
    {
        $grade->delete();

        return redirect()
            ->route("grade::index")
            ->with('success',
                trans('general.delete_success', [
                    'name' => trans('general.grade')
                ])
            );

    }
}
