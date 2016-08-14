<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scholastics\StoreRequest;
use App\Http\Requests\Scholastics\UpdateRequest;
use App\Http\Requests\Scholastics\DeleteRequest;

use App\Http\Requests;
use App\User;
use App\Models\ClassLayer\Scholastic;

class ScholasticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scholastics.index', [
            'scholastics' => Scholastic::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scholastics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Scholastic::create($request->all());

        return redirect()
            ->route('scholastic::create')
            ->with('success',
                trans('general.create_success', [
                    'name' => trans('general.scholastic')
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
    public function edit(Scholastic $scholastic)
    {
        return view('scholastics.edit', [
            'scholastic' => $scholastic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Scholastic $scholastic)
    {
        $scholastic->update($request->all());
        return redirect()
            ->route("scholastic::edit", $scholastic)
            ->with('success',
                trans('general.update_success', [
                    'name' => trans('general.scholastic')
                ])
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Scholastic $scholastic)
    {
        $scholastic->delete();

        return redirect()
            ->route("scholastic::index")
            ->with('success',
                trans('general.delete_success', [
                    'name' => trans('general.scholastic')
                ])
            );

    }
}
