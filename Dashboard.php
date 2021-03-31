<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: indexx.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
     <span >   <span><b id="welcome">Welcome to your Dashboard <i><?php echo $login_session; ?></i></b></span> 
        </span>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="Dashboard.php" class="w3-bar-item w3-button active"><i class="fa fa-home"></i>Dashboard</a>
      <a href="bidding.php" class="w3-bar-item w3-button"><i class="fa fa-"></i> Bidding</a>
      <a href="outgoing.php" class="w3-bar-item w3-button"><i class=""></i> Pending Bid</a>
       <a href="incoming.php" class="w3-bar-item w3-button active"><i class="fa fa-money"></i>Incoming Bid</a>
      <a href="cashout.php" class="w3-bar-item w3-button"><i class="fa fa-money"></i> Sell out</a>
      <a href="profile.html" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Profile</a>
       <a href="logout.php" class="w3-bar-item w3-button active"><i class="fa fa-leave"></i>Logout</a>
     
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">X</a>
  <a href="Dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button active">Dashboard</a>
  <a href="bidding.php" onclick="w3_close()" class="w3-bar-item w3-button">Bidding</a>
  <a href="outgoing.php" onclick="w3_close()" class="w3-bar-item w3-button">Pending Bid</a>
   <a href="incoming.php" onclick="w3_close()" class="w3-bar-item w3-button active">incoming Bid</a>
  <a href="cashout.php" onclick="w3_close()" class="w3-bar-item w3-button">Sell out</a>
  <a href="profile.html" onclick="w3_close()" class="w3-bar-item w3-button">Profile</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Logout</a>
  
</nav>
<header class="w3-container w3-red w3-center" style="padding:40px 16px; margin-bottom: -40px;: ">
  <p style="font-size: 35px;" class="w3-margin w3-">Next Auction in:</p>
  <p style="font-size: 20px;" class="w3" id="demo"></p>
  <button class="btn w3-button w3-blue w3-padding-large w3-large w3-margin-top" id="book">Book</button>
</header>

  <div class="w3-container" style="padding:10px 16px" id="team">
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       
        <div class="w3-container">
          <h3><i class="fa fa-fw"></i> Money Out</h3>
          <hr>
          <br>
          
          <h3><i class="fa fa-fw fa-money"></i> Amount:</h3>
          <hr>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
    
        <div class="w3-container">
          <h3><i class="fa fa-fw"></i> Money in</h3>
          <hr>
          <br>
          <h3><i class="fa fa-fw fa-money"></i> Amount:</h3>
          <hr>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <div class="w3-container">

          <h3>Bonus Withdrawal</h3>
           <hr>
         <center> <h3 class="w3-opacity">0</h3></center>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-arrow-up"></i> Withdraw</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       
        <div class="w3-container">
          <h3>Recruits</h3>
          <hr>
          <br>
         <center> <h3>0</h3></center>
          <hr>
         
         
        </div>
      </div>
    </div>
  </div>
</div>


<!-- About Section -->



</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-whatsapp w3-hover-opacity"></i>
    <i class="fa fa-telegram w3-hover-opacity"></i>
  </div>
</footer>
 
<script>
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
// Set the date we're counting down to
var countDownDate = new Date("oct 08, 2020 18:06:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML ="Now";
  }
}, 1000);
</script>


</body>
</html>
