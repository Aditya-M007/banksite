
<?php
//handle login
session_start();
//check if user ids already logged in

if(isset($_SESSION['username'])){
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$username=$password="";
$err="";
//if request method is post
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty(trim($_POST['username']))|| empty(trim($_POST['password']))){
        $err="Please enter useranme + password";
    }
    else{
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
    }



    if(empty($err)){

        $sql="SELECT id,username,password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param($stmt,"s",$param_username);
        $param_username=$username;
        mysqli_stmt_execute($stmt);


        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){//execute statement
                mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password,$hashed_password))
                    {
                        //allow user to login

                        session_start();
                        $_SESSION["username"]=$username;
                        $_SESSION["id"]=$id;
                        $_SESSION["loggedin"]=true;

                        //readirect  user to welcome page
                        
                        header("location:welcome.php");
                       
                    }
                }
            }
        }
    }



}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>banking</title><link rel="stylesheet" href="style.css">
    <style>
        body {
          background-image: url('photo.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
        }
    </style>
</head>
<body>

   
    <nav>
      <img src="logo.svg" alt="" id="l">

        <ul class="navlinks">
        
       <li class="nav-item active">
        <a class="nav-link" href="login.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/LoginPage/register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
      
           
        </ul>
    </nav>


<!-- <div class="overlay">
    <a class="close">&times;</a>
    <div class="overlaycontent">
    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="/LoginPage/register.php">Register</a>
    <a class="nav-link" href="#">Contact us</a>
    </div> -->
    
     
</div>

<div class="container mt-4">
<h3>Login here</h3>
<br>
<hr>
<br>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name = "username" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="Submit" name= "submit"
        value="Submit" class="button">
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</div>


    <!-- <div class="container">   
        <label>Username : </label>   
        <input type="text" placeholder="Enter Username" name="username" required>  
        <label>Password : </label>   
        <input type="password" placeholder="Enter Password" name="password" required>  
        <input type="Submit" name= "submit"
        value="Submit" class="button">
    </div>    -->
</body>
</html> 


<!-- <!doctype html>
<html lang="en">
  <head>
    Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>PHP login System</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Banking site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>  -->


  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  <!-- </body>
</html> -->