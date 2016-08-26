<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ClassLayer\Cl4ss;

class Cl4ssController extends Controller
{

	public function cl4ssPast()
	{
		$pst_cl4sses = Cl4ss::responsibleCl4ss(Cl4ss::STATE_DEACTIVE)
			->loadRelation()
			->orderBy('id', 'DESC')
			->get();

		return view('teacher.cl4ss_pasts.index', [
			'cl4sses' => $pst_cl4sses,
		]);
	}

	public function cl4ssCurrent()
	{
		$current_cl4sses = Cl4ss::responsibleCl4ss(Cl4ss::STATE_ACTIVE)
			->loadRelation()
			->orderBy('id', 'DESC')
			->get();

		return view('teacher.cl4ss_currents.index', [
			'cl4sses' => $current_cl4sses,
		]);
	}
}
