<?php
/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 28/08/2016
 * Time: 13:00
 */

namespace App\Repositories;

use App\Models\ClassLayer\Cl4ssType;

class Cl4ssTypeRepo
{
	public function get(){
		return Cl4ssType::all();
	}
}