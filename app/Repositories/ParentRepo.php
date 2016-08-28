<?php
/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 28/08/2016
 * Time: 13:00
 */

namespace App\Repositories;

use App\Models\UserLayer\Paren;

class ParentRepo
{
	public function get(){
		return Paren::all();
	}
}