<?php

namespace App\Http\Controllers;

use App\Http\Requests\Semesters\StoreRequest;
use App\Http\Requests\Semesters\UpdateRequest;
use App\Http\Requests\Semesters\DeleteRequest;

use App\Http\Requests;
use App\Models\ClassLayer\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('semesters.index', [
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Semester::create($request->all());

        return redirect()
            ->route('semester::create')
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
    public function edit(Semester $semester)
    {
        return view('semesters.edit', [
            'semester' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Semester $semester)
    {
        $semester->update($request->all());
        return redirect()
            ->route("semester::edit", $semester)
            ->with('success', trans('general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Semester $semester)
    {
        $semester->delete();

        return redirect()
            ->route("semester::index")
            ->with('success', trans('general.delete_success'));

    }
}
