<?php

namespace App\Http\Controllers;

use App\Http\Requests\Parents\StoreRequest;
use App\Http\Requests\Parents\UpdateRequest;
use App\Http\Requests\Parents\DeleteRequest;

use App\Models\MarkLayer\Subject;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserLayer\Paren;
use App\Models\UserLayer\Student;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parents.index', [
            'parents' => Paren::with('students')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $students = Student::all();
        return view('parents.create',[
	        'students' => $students
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
	    Paren::storeParent($request);

        return redirect()
            ->route('parent::index')
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
    public function edit(Paren $parent)
    {
        return view('parents.edit', [
	        'students' => Student::all(),
            'parent' => $parent
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Paren $parent)
    {
	    $parent->updateParent($request);

        return redirect()
            ->route("parent::edit", $parent)
            ->with('success',trans('general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Paren $parent)
    {
        $parent->delete();

        return redirect()
            ->route("parent::index")
            ->with('success',
                trans('general.delete_success', [
                    'name' => trans('general.parent')
                ])
            );

    }
}
