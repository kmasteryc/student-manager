<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Models\ClassLayer\Cl4ss;

class Cl4ssPastController extends Controller
{
	public function index(){
		$pst_cl4sses = Cl4ss::responsibleCl4ss(Cl4ss::STATE_DEACTIVE)
			->loadRelation()
			->orderBy('id','DESC')
			->get();

		return view('teacher.cl4ss_pasts.index',[
			'cl4sses' => $pst_cl4sses
		]);
	}
//	public function
}