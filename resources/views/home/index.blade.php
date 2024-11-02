@extends("home.dashTemp")
<style>
#demo {
display: none;
}
#sec2 {
  display: none;
}
</style>

<script src={{'asset/jquery.js'}}></script>


@section('content1')
<section class="container" style="margin-top:5%">
    <header>Create Your Desired Project</header>
    <form action="newProject" class="form" method="Post" enctype="multipart/form-data">
       @csrf
        <div class="input-box address">
      
      <label>Project Category</label><br>
      <div class="select-box">
            
            <select name="category">
              <option hidden>Select Project Category</option>
              <option value="Tech">Tech</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Religion">Religion</option>
            </select>
          
      </div>
      <br>

            <label>Project Title</label>
            <input type="text" placeholder="Enter Title" name="title"/><br><br>

            <label>Project Details</label><br><br>
            <textarea style="width: 600px; height: 300px" name="content"></textarea><br><br>
            <label>Upload File</label>
            <input type="file"name="file"><br><br>
        </div>    
     <button>Submit</button>
    </form>
  </section>

@endsection

@section('content2')

<div class="table-header">
<h1> Project Details</h1>
<div>
<input placeholder="Search...">
<button class="add_new"><i class="fa fa-search"></i></button>
</div>
</div>
@if($errors->any())
@foreach($errors->all() AS $error)
<li>{{$error}}</li>
@endforeach
@endif
<div class="table_section">
<table>

<thead>
<tr>
        			
<th>Project Category</th>
<th>Project Title</th>
<th>Project Description</th>
<th>Action</th>
</tr>     
</thead>

                
  @foreach($project AS $result)
  <tbody>
  <tr>
        				
  <td>{{$result->catergory}}</td>
  <td>{{$result->title}}</td>
  <td>{{$result->content}}</td>
  <td>
  <a onclick="" href="task/{{$result->id}}">Create Task</a>
  <a onclick="" href="view/{{$result->id}}">View Task</a>
                  
  </td>
 
  </tr>
  </tbody>
        
 @endforeach      

</table> 

</div>

        
@endsection

  
<script>
function show(caller) {
 $('#demo').insertAfter($(caller));
 $("#demo").show();
}



/*function createFunction(){
  document.getElementById("sec1").style.display = block;
  document.getElementById("sec2").style.display = none;
}

function viewProject(){
  document.getElementById("sec1").style.display = none;
  document.getElementById("sec2").style.display = block;
}*/
</script>