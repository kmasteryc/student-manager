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
		dd($this->api());
	}


	public function index2()
	{
		return redirect()->route('test',['i3d'=>3]);
	}

	public function test(Request $request)
	{
		echo $request['sss'];
		dd($request->all());
	}

}
