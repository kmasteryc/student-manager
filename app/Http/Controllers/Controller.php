<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepo;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	private $resolvedRepo = [];

	public function repo($method)
	{
		if (!array_key_exists($method, $this->resolvedRepo)){
			$repo = "App\\Repositories\\".ucfirst(camel_case($method)).'Repo';
			$this->resolvedRepo[$method] =  new $repo;
		}
		return $this->resolvedRepo[$method];
	}
}
