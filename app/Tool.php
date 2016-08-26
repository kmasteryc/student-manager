<?php
/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 26/08/2016
 * Time: 15:06
 */

namespace App;


use App\Models\MarkLayer\Mark;
use Illuminate\Support\Collection;

class Tool
{
	public static function label(User $user){
		$role = $user->role;
		switch ($role->id){
			case 1:
				return "<span class='label label-default'>$role->role_name</span>";
				break;
			case 2:
				return "<span class='label label-info'>$role->role_name</span>";
				break;
			case 3:
				return "<span class='label label-primary'>$role->role_name</span>";
				break;
			case 4:
				return "<span class='label label-danger'>$role->role_name</span>";
				break;
		}
	}
	public static function average(Collection $marks){
		$total = 0;
		if ($marks->count() > 0){
			$marks->each(function($mark) use (&$total){
				if ($mark !== null){
					$total += $mark->mark_point * $mark->markType->mark_type_multiple;
				}
			});
		}
		return $total/100 ?:'';
	}

	public static function TestResponse(){
		return redirect()->to();
	}

}