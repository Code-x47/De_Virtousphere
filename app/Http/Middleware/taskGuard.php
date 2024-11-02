<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param string $projectId
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
           //$project = Project::findOrFail($req->id);

          /* if(!auth()->id() == $project->user_id) {
           abort(403);
           }*/

        return $next($req);
    }
}
