<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\ClassLayer\Scholastic' => 'App\Policies\ScholasticPolicy',
        'App\Models\ClassLayer\Semester' => 'App\Policies\SemesterPolicy',
        'App\Models\ClassLayer\Grade' => 'App\Policies\GradePolicy',
        'App\Models\ClassLayer\Cl4ss' => 'App\Policies\Cl4ssPolicy',
        'App\Models\MarkLayer\MarkType' => 'App\Policies\MarkTypePolicy',
        'App\Models\MarkLayer\Mark' => 'App\Policies\MarkPolicy',
        'App\Models\MarkLayer\Subject' => 'App\Policies\SubjectPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    }
}
