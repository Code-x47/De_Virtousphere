<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Project;
use App\Policies\projectPolicy;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class projectController extends Controller
{
     //CREATE NEW PROJECT
     public function newProject(Request $req){
        $validate = $req->validate([
             "title"=>"Required",
             "category"=>"Required",
             "content"=>"Required"
        ]);
           $name = $req->input('title');
 
           $filename = $name.".".$req->file->getClientOriginalExtension();
           $req->file->move("docs",$filename);
           $project = new Project;
           $project->user_id = auth()->id();
           $project->title = $req->title;
           $project->file = $filename;
           $project->catergory = $req->category;
           $project->content = $req->content;
           $result = $project->save();
           return back();
          
       }
 
    

  
       
 
 
 
       
       //TASK VIEW PAGE
       public function viewTask(Request $req,$id) {
        $perPage = $req->input("per_page", 4);
        $data = Task::where("project_id",$id)->paginate($perPage);
        return view("home.tasks",compact("data"));
       }


 
       //TASK DOWNLOAD PAGE
       function download($file){
          return response()->download(public_Path("docs/".$file));
        }

        //TASK FILTER CONTROLLER
        public function task_filter() {
        $data = $_GET['task'];
         $task = Task::where("priority","like","%".$data."%")->get();
         return view("home.search", compact("task"));
       }
 



     public function delete($id) {
      
      $projectId = Task::find($id);

       if($projectId->taskBelongs->user_id != auth()->id()){
          abort(403, "Unauthorized Action");
         }
          $deleteTask = Task::find($id);
          $deleteTask->delete();
          return back();
       }
       
       public function edit($id) {
      
        $projectId = Task::find($id);
  
         if($projectId->taskBelongs->user_id != auth()->id()){
            abort(403, "Unauthorized Action");
           }
            $edit = Task::find($id);
            
            return view("home.update",compact('edit'));
         }
  
       
}
