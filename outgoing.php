<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: indexx.php"); // Redirecting To Home Page
}
?>
<?php
  $date=date_create();
date_date_set($date,2020,10,30);
$conn = mysqli_connect("localhost", "root", "", "onlinemoneymarket");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['pay'])) {
$sql = "SELECT buyer,amount,due,paid,seller,contact,bank,account FROM pending WHERE buyer='$login_session'";

$result = $conn->query($sql);
if($result->num_rows ==1 ){
while($row = $result->fetch_assoc()){
  //pending*************
  $username=$row['buyer'];
  $amount=$row['amount'];
  $due=$row['due'];
  $paid=$row['paid'];
  $seller=$row['seller'];
  $contact=$row['contact'];
  $bank=$row['bank'];
  $account=$row['account'];
 //***********************
  //confirm**************
  

$inset="INSERT INTO maturing (username,balance,due,paid,seller,contact,bank,account) values ('  $username','$amount','$due','$paid','$seller','$name','$bank','$account')";
$sqil = "DELETE FROM pending WHERE buyer='$login_session'";
if (mysqli_query($conn,$inset) && mysqli_query($conn,$sqil)) {
  echo "Goood";
  
}
  
}}

}
 
$conn->close();
?>


<!DOCTYPE html>
<html>
<title>Pending Bids</title>
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
     <span >  Make Payment</span> 
  
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
 <table class="table" style="margin-top: 20px;"><th>Username</th><th>Amount</th><th>Bank</th><th>Account</th><th>Contact</th><th>Confirmation</th>
  <?php
  $date=date_create();
date_date_set($date,2020,10,30);
$conn = mysqli_connect("localhost", "root", "", "onlinemoneymarket");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT seller,bank,due, amount,account,contact FROM pending WHERE buyer='$login_session' AND paid='no'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
//if (date("Y-m-d")==$row['datte']) {
  $name=$row['seller'];
  $balance=$row['amount'];
  $account=$row['account'];
  $bank=$row['bank'];
  $contact=$row['contact'];
echo "<form action='' method='POST'><tr><td>" . $row["seller"]. "</td><td>" . $row["amount"]. "<td>" . $row["bank"]. "</td><td>" . $row["account"]. " </td> <td>" . $row["contact"]. "</td><td>Pending</td></tr></form>";
}//}
echo "</table>";
} else { echo "0 results".mysqli_error($conn); }
$conn->close();
?>
  
 </table>
</header>

  
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


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
</script>

</body>
</html>

