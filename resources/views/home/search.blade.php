<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Task Table</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/style2.css">
    <link rel="stylesheet" href="asset/regStyle2.css">
    <link rel="stylesheet" type="text/css" href={{asset("asset/table.css")}}>
    <base href="/public">
    <script src="https://unpkg.com/vue@3.0.2"></script>
</head>

<body>
<div class="table-header">
    		<h1> Task Outline</h1>
    		<div>
                <form action="search" method="get">
    			<input placeholder="Search..." name="task" type="text">
    			<button class="add_new"><i class="fa fa-search"></i></button>
                </form>
    		</div>
    	</div>
        <div class="table_section">
        	<table>
        		<thead>
                <tr>
        			
        	  <th>Task Category</th>
              <th>Task Description</th>
              <th>Task Priority</th>
        	  <th>Action</th>
                </tr>     
                </thead>

                @foreach($task AS $result)

                <tbody>
        			<tr>
                <td>{{$result->taskBelongs->catergory}}</td>
                <td>{{$result->description}}</td>
                <td>{{$result->priority}}</td>
                <td>
        		<button> <a href="download/{{$result->taskBelongs->file}}"> Download Project </a></button>
                </td>
        			</tr>
        		</tbody>
        

        @endforeach      
         
 </table>

</div>

</body>

</html>