<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{

	public function index()
	{
		if (auth()->check()) {
			switch (auth()->user()->role_id) {
				case 1:
					return redirect()->route('student::subject::current');
					break;
				case 2:
					return redirect()->route('parent::student::index');
					break;
				case 3:
					return redirect()->route('teacher::subject::teaching');
					break;
				case 4:
					return redirect()->route('admin::cl4ss::index');
					break;
			}
		}

		return view('home');
	}
}
