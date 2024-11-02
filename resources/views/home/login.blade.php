

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="asset/agentLogin.css">
</head>
<body style="background: lemonchiffon;">


    <h1>Login Page</h1>


<div class="login">
   
  <h2 class="active" style="cursor: pointer;"> Back </h2>

  <h2 class="active" style="cursor: pointer;"> sign in </h2>

  <h2 class="active" style="cursor: pointer;"> sign up </h2>
  <form action="/login" method="Post">
   @csrf
    

    <input type="text" class="text" name="username">
     <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="password">
    <span>password</span>
    <br>

    <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1">Keep me Signed in</label>
    
    <button class="signin">
      Sign In
    </button>


    <hr>

   
  </form>

</div>


</body>
</html>
