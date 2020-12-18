<?php

$conn=mysqli_connect('localhost','root','','onlinemoneymarket');
if ($conn) {

   if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $contact= $_POST["contact"];
    $bank=$_POST["bank"];
    $sponsor=$_POST["sponsor"];
    $account=$_POST["account"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $confirm=$_POST["confirm"];
      $login="insert into login (username,password) values ('$username','$password')";

      $sql = "insert into users (name,surname,contact,bank,account,sponsor,username,password) values ('$name','$surname','$contact','$bank','$account','$sponsor','$username','$password')";
     if ($password != $confirm) {
     	$error= "<script> alert('Passwords don't match')</script>";
     }
   else if(mysqli_query($conn,$sql) && mysqli_query($conn,$login)){
         $error = "<script> alert('you have succesefully registered, process to login')</script>";
    }
    else{
      echo "not succesefulffl".mysqli_error($conn);
    }     
    # code...
   }
 }
else{
      die("not succesefullll".mysqli_error($conn));
    }     
  

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<meta chars<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
et="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
  <div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">

    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small" style="">
      <a href="index.html" class="w3-bar-item w3-button active"><i class="fa fa-home"></i>Home</a>
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Login</a>
      <a href="Register.html" class="w3-bar-item w3-button"><i class=""></i> Register</a>
      
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none;"  id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">X</a>
  <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button active">Home</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
  <a href="Register.html" onclick="w3_close()" class="w3-bar-item w3-button">Register</a>
</nav>



<form action="" method="POST">
	
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

 <label><b>Name</b></label>
     <input class="row" type="Text" name="name" placeholder="Name" style="margin-bottom: 5px;" required>
<label><b>Surname</b></label>
    <input class="row" type="Text" name="surname" placeholder="Surname" style="margin-bottom: 5px;" required>
<label><b>Contact</b></label>
    <input class="row" type="text" name="contact" maxlength="10" minlength="10" placeholder="Contact Number" style="margin-bottom: 5px;" required="number" pattern="[0]{1}[0-9]{9}">
<label><b>Bank</b></label>   
    <input class="row" type="Text" name="bank" placeholder="Bank Name" style="margin-bottom: 5px;" required>
<label><b>Account</b></label>
    <input class="row" type="Text" name="account" placeholder="Account Number" style="margin-bottom: 5px;" required>
    <label><b>Sponsor</b></label>
    <input class="row" type="Text" name="sponsor" placeholder="Sponsor Id" style="margin-bottom: 5px;" required>
<label><b>Username</b></label> 
    <input class="row" type="Text" name="username" placeholder="Username" style="margin-bottom: 5px;" required>
<label><b>Password</b></label>
    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="row" type="password" name="password" placeholder="Password" style="margin-bottom: 5px;" required>
<label><b>Repeat password</b></label>
    <input   class="row" type="password" name="confirm" placeholder="Confirm Password" style="margin-bottom: 5px;" required>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" onclick="validate()" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="logout.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
