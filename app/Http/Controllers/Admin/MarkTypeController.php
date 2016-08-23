<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Mark_types\StoreRequest;
use App\Http\Requests\Mark_types\UpdateRequest;
use App\Http\Requests\Mark_types\DeleteRequest;

use App\Http\Requests;
use App\User;
use App\Models\MarkLayer\MarkType;

class MarkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mark_types.index', [
            'mark_types' => MarkType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mark_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        MarkType::create($request->all());

        return redirect()
            ->route('mark_type::create')
            ->with('success',
                trans('general.create_success', [
                    'name' => trans('general.mark_type')
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
    public function edit(MarkType $mark_type)
    {
        return view('mark_types.edit', [
            'mark_type' => $mark_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, MarkType $mark_type)
    {
        $mark_type->update($request->all());
        return redirect()
            ->route("mark_type::edit", $mark_type)
            ->with('success',
                trans('general.update_success', [
                    'name' => trans('general.mark_type')
                ])
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, MarkType $mark_type)
    {
        $mark_type->delete();

        return redirect()
            ->route("mark_type::index")
            ->with('success',
                trans('general.delete_success', [
                    'name' => trans('general.mark_type')
                ])
            );

    }
}
