# De_Virtousphere
John Chidozie's Task

User Login are as follows: admin@gmail.com and user@gmail.com
Password is: password

@index.blade.php: you will find The create Project Option, View Project Option and Create Task Option.

Every user can create project but ony owners of Project can assign a task to a particular project.

I will call it a photo Creating Project so the task is based on adding new features to the photo Project;
Download Files at the Task table and update to the project standard. 

Answers to questions:
QUESTION:1
1. Store information about the users in the system (both task assigners and assignees)
 
public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(0);
            $table->string("role_id")->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
   }
   Project Table:
   To Create The Project That Requires A task
   public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("catergory");
            $table->string("title");
            $table->longText("content");
            $table->foreignId("user_id")->constrained();
            $table->timestamps();
            $table->string("file");
        });
    }

   Task Table:
   To store the Task That The User Can Work On.
      public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->string('description');
            $table->string('priority');
            $table->timestamps();
        });
    }

Create Relationships:

USER TABLE:
User Table Has A relationship with Task and Project table.
  public function userProject(){
        return $this->hasMany(Project::class,"user_id");
     }
     
     public function userTask(){
        return $this->hasMany(Task::class,"user_id");
     }

PROJECT TABLE:
Project table has relationships with Both user and task Table.
 public function projectBelongs() {
    return $this->belongsTo(User::class,"user_id");
    }

    public function projectHas() {
        return $this->hasMany(Task::class,"project_id");
    }

    TASK TABLE:
    Task table is related to user and Project TABLE:

    public function taskBelongs(){
    return $this->belongsTo(Project::class,"project_id");
  }


  QUESTION 2:
  Create a permission that allows only Project Owners create, Delete or Edit Tasks

  //FOR CREATING TASKS
@Policy->projectPolicy
   public function update(User $user, Project $project)

    {
    return $project->user_id == auth()->user()->id;
    }


    
@Controller

public function task_create(Request $req,Project $project)
    {
       
   if(!Gate::allows('update',$project))
  {
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

FOR DELETING TASKS:
  @ Policy 
  public function delete(User $user, Project $project)
    {
        return $project->user_id == auth()->user()->id;
    }

    @controller
    public function delete(Project $project, $id)
    {
    $this->authorize("delete",$project);
    $delete = Task::find($id);
    $delete->delete();
    return back();
    }

    @blade use @can("delete,$project) to hinder access;

    

    QUESTION 4:

    To implement functionallity that filters task by their priority(Low, Medium and High)
     for a given project in laravel, you can use Eloquent's query methods. Below is an example of how you might structure it.

       public function task_filter() {
        $data = $_GET['task'];
         $task = Task::where("priority","like","%".$data."%")->get();
         return view("home.search", compact("task"));
       }


       Question 5:
       The strategy I will use to ensure the queries remain efficient as the number of tas grow is pagination.
       Instead of loading all task at once. I used pagination to load a subset of tasks. This reduces memory usage and improve load time.
       Find Code Below:
       
        public function viewTask(Request $req,$id) {
        $perPage = $req->input("per_page", 4);
        $data = Task::where("project_id",$id)->paginate($perPage);
        return view("home.tasks",compact("data"));
       }

 
