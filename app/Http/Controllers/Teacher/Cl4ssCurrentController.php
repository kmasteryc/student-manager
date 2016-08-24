<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Models\ClassLayer\Cl4ss;

class Cl4ssCurrentController extends Controller
{
	public function index(){
		$current_cl4sses = Cl4ss::responsibleCl4ss(Cl4ss::STATE_ACTIVE)
			->loadRelation()
			->get();

		return view('teacher.cl4ss_currents.index',[
			'cl4sses' => $current_cl4sses
		]);
	}
//	public function
}