<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grades\StoreRequest;
use App\Http\Requests\Grades\UpdateRequest;
use App\Http\Requests\Grades\DeleteRequest;

use App\Http\Requests;
use App\Models\MarkLayer\MarkType;
use App\User;
use App\Models\ClassLayer\Grade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ClassLayer\Cl4ss;
use Cookie;
use App\TestClass;
class TestController extends Controller
{

	public function __construct()
	{

	}

	public function index()
	{
		$data = array(
			'code' => '1',
			'name' => 'asd'
		);
		var_dump(array_keys($data));
		$rules = [
			array_keys($data)[0] => 'required|numeric',
			array_keys($data)[1] => 'required'
		];

		$valid = \Validator::make($data, $rules);

		dd($valid->fails());
		return view('test');
	}

	public function index1()
	{
		echo 'I am index1';
	}

	public function test(Request $request)
	{
		echo $request['sss'];
		dd($request->all());
	}

}
