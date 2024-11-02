<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Policies\projectPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        return view("home.index",compact("project"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {   
      // $this->authorize('view',$project);
        $data = Project::find($id);
       
        return view("home.taskForm",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      /* if(!Gate::allows('update',$project))
        {
             
          
          }*/
          //$projectId = Project::find($id);
          /*if($projectId->user_id === auth()->id()){
            abort(403, "Unauthorized Action");
          }*/
  
    public function task_create(Request $req,$id)
    {
          $projectId = Project::find($id);
           if($projectId->user_id != auth()->id()){
            abort(403, "Unauthorized Action");
           }
          

           $req->validate([
           "priority"=>"Required",
           "desc"=>"Required"
          ]);
          
          $task = new Task;

          $task->user_id = auth()->id();
  
          $task->project_id = $projectId->id;
          if($req->priority == 1) {
           $task->priority = "High";
          }
          elseif($req->priority == 2) {
           $task->priority  ="Medium";
          }
          else {
           $task->priority == "Low";
          }
  
          $task->description = $req->desc;
  
          $task->save();
  
          return back();
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
