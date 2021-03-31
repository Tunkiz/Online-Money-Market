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
if (isset($_POST['buy'])) {

$amount=$_POST['amount'];
$balance=$_POST['balance'];
$user=$_POST['username'];
$sql = "SELECT balance,username,bank,account,contact,datte FROM bidding WHERE username='$user' AND balance='$balance'";
$result = $conn->query($sql);
if($result->num_rows ==1){
while($row = $result->fetch_assoc()){
$value=$row['balance'];
$name=$row['username'];
$bank=$row['bank'];
$account=$row['account'];
$contact=$row['contact'];
$datte=$row['datte'];
if ($value>=$amount && $amount>=300) {

  $pay= "SELECT * FROM pending WHERE buyer='$login_session'";
      $pend=mysqli_query($conn,$pay);
         if($pend->num_rows <=0){  
     $update_balance=$value-$amount;
     $upd="UPDATE bidding SET balance='$update_balance' WHERE username='$user'";
if (mysqli_query($conn,$upd)) {
       
  $dat = date('yy-m-d');
    echo "<script>alert('Successfully bidded, proceed to make payment');</script>";
    //pending payment
     $pending="insert into pending (buyer,amount,due,seller,contact,bank,account) values ('$login_session','$amount','$dat','$name','$contact','$bank','$account')";
     if (mysqli_query($conn,$pending)) {
           echo "Successfully";
     }
     else{
      echo "error".mysqli_error($conn);
     }

}
}
else{
  echo "<script>alert('Make payment first');</script>";
}
}
else if($amount<300){
   echo "<script>alert('Amount smaller than minimum Bidding amount')</script>";
}
else{
  echo "<script>alert('Amount bigger than Available Bid')</script>";
 
}}
}}

 
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>Bidding</title>
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
     <span >  Make a Bid</span> 
  
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
  <a href="javascript:void(0)" onclick="close()" class="w3-bar-item w3-button w3-large w3-padding-16">X</a>
  <a href="Dashboard.php" onclick="close()" class="w3-bar-item w3-button active">Dashboard</a>
  <a href="bidding.php" onclick="close()" class="w3-bar-item w3-button">Bidding</a>
  <a href="outgoing.php" onclick="close()" class="w3-bar-item w3-button">Pending Bid</a>
   <a href="incoming.php" onclick="close()" class="w3-bar-item w3-button active">incoming Bid</a>
  <a href="cashout.php" onclick="close()" class="w3-bar-item w3-button">Sell out</a>
  <a href="profile.html" onclick="close()" class="w3-bar-item w3-button">Profile</a>
  <a href="logout.php" onclick="close()" class="w3-bar-item w3-button">Logout</a>
  
</nav>
<header class="w3-container w3-red w3-center" style="padding:40px 16px; margin-bottom: -40px;: ">
 <table class="table" style="margin-top: 20px;"><th>Bank</th><th>Seller Balance</th><th>Package</th><th>Your Bid Amount</th><th>Bid</th>
  <?php
  $date=date_create();
date_date_set($date,2020,10,30);
$conn = mysqli_connect("localhost", "root", "", "onlinemoneymarket");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT username,bank,datte, balance FROM bidding WHERE balance>0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
//if (date("Y-m-d")==$row['datte']) {
  if($row['username']!=$login_session){
  $name=$row['username'];
  $balance=$row['balance'];
echo "<form action='' method='POST'><tr><td><input style='display:none;width:1px;' type='text' name='username' value='$name' readonly>" . $row["bank"]. "</td><td><input type='text' name='balance' value='$balance' style='border:none; width: 50px;' readonly></td><td><select><option>2 days</option><option>4 days</option></select> </td> <td><input style='width:110px;' name='amount' type='text'></td><td><input type='submit' name='buy' value='Buy'></td></tr></form>";
}}//}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
  
 </table>
</header>

  
<script>
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>

