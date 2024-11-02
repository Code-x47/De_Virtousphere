{{$data->id}}
<section class="container" style="margin-top:5%">
    <header>Create A Task</header>
    
        <form action="{{url('task_create',$data['id'])}}" class="form" method="POST">
        @csrf
          
        <input type="hidden" name="id" value="{{$data['id']}}">
    
        <div class="input-box address">
          
        <label>Select Priority</label><br>
        <div class="select-box">
                
          <select name="priority">
            <option hidden>Select Priority</option>
            <option value="1">High</option>
            <option value="2">Medium</option>
            <option value="3">Low</option>
           </select>
        </div>
        <br>
    
      <label>Task Description</label>
      <input type="text" placeholder="Enter Description" name="desc"/><br><br>
    
      </div>
      <input type="submit" value="Submit">
      </form>
      </section>
      </div>
      </td>
      
  
      