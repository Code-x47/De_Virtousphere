<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Project;
use App\Policies\projectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Project::class => projectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       /* Gate::define("create_task",function($user, Project $project){
          return $user->id === $project->user_id;
         });*/
    }
}
