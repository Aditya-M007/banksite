 <?php

$insert = false;
   if(isset($_POST['name'])){

   
   $_SERVER ="localhost";
   $username="root";
   $password="";

   $con = mysqli_connect($_SERVER,$username,$password);

   if(!$con){
       die("Connection to this database failed due to". mysqli_connect_error());

   }

     $email=$_POST['email'];
     $name=$_POST['name'];
     $phone=$_POST['phone'];
     $gender=$_POST['gender'];
     $address=$_POST['address'];
     $pan=$_POST['pan'];
     $dob=$_POST['dob'];

   $sql = "INSERT INTO `login`.`app` (`email`, `name`,`phone` , `gender`, `address`, `pan`, `dob`) VALUES ('$email','$name', '$phone', '$gender','$address', '$pan','$dob');";

       
       
      

  if($con-> query($sql) == true){

    $insert=true;
  }
  else{
      echo "ERROR: $sql <br> $con->error";
  }
  $con -> close();
   }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="container mt-4">
  <form action="apply.php" method="POST">

  <div class="form-group ">
  <div class="quiz_timer">
				<span class="time">00:00</span>
			  </div>
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
    
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name"id="inputEmail4" >
    </div>
    <div class="form-group ">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" name="phone" id="phone">
    </div>
 
  <div class="form-group " >
    <label for="gender">Gender</label>
    <input type="text" class="form-control" id="gender" name="gender" placeholder="M/F/other">
  </div>


 
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" cols="30" rows="10" id="address" name="address" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">PAN Card number</label>
    <input type="text" class="form-control" name="pan" id="inputAddress2" >
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" id="dob"name="dob" placeholder="dd/mm/yyyy">
  </div>
 
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>

  <a href="trans.php" type="submit" id="submit" onclick="redirect()" class="btn btn-primary">Sign In</a>
  
 
</form>

  </div>


  
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="timer.js"></script>
    <script src="redirect.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>



