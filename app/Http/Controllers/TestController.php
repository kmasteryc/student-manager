<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grades\StoreRequest;
use App\Http\Requests\Grades\UpdateRequest;
use App\Http\Requests\Grades\DeleteRequest;

use App\Http\Requests;
use App\Models\ClassLayer\Cl4ss;
use App\Models\MarkLayer\MarkType;
use App\User;
use App\Models\ClassLayer\Grade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{

	public function __construct()
	{

	}

	public function index()
	{
		return view('test');
	}

	public function index1()
	{
		echo 'I am index1';
	}

	public function test1(Request $request)
	{
		dd($request->all());
	}

	public function test2()
	{

	}

}
