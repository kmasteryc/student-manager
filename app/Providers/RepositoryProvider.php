<?php

namespace App\Providers;

use App\Repositories\Cl4ssTypeRepo;
use App\Repositories\GradeRepo;
use App\Repositories\ScholasticRepo;
use App\Repositories\SemesterRepo;
use App\Repositories\StudentRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
	protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        app()->singleton('studentRepo', function(){
//	        return new StudentRepo;
//        });
//	    app()->singleton('scholasticRepo', function(){
//		    return new ScholasticRepo;
//	    });
//	    app()->singleton('semesterRepo', function(){
//		    return new SemesterRepo;
//	    });
//	    app()->singleton('gradeRepo', function(){
//		    return new GradeRepo;
//	    });
//	    app()->singleton('cl4ssTypeRepo', function(){
//		    return new Cl4ssTypeRepo;
//	    });
    }
}
