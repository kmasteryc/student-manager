<?php
namespace App\Test;
use App\Models\UserLayer\Teacher;

/**
 * Created by PhpStorm.
 * User: kmasteryc
 * Date: 22/08/2016
 * Time: 14:07
 */
abstract class TestClass implements A
{

	private $a;

	abstract public function getAll();
}
interface B{}
interface A extends B{
	public function what();
}

class Test extends TestClass implements A{
	public function getAll()
	{
		// TODO: Implement getAll() method.
	}
	public function what(){
		echo '';
	}
}