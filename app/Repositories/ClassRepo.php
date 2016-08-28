<?php
/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 28/08/2016
 * Time: 13:00
 */

namespace App\Repositories;

use App\Models\ClassLayer\Cl4ss;

class ClassRepo
{
	public function get(){
		return Cl4ss::all();
	}
}