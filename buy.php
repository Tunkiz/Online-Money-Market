<?php
  $date=date_create();
date_date_set($date,2020,10,30);
$conn = mysqli_connect("localhost", "root", "", "onlinemoneymarket");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$amount=$_POST['amount'];
$balance=$_POST['balance'];
$user=$_POST['username'];
$sql = "SELECT balance FROM bidding WHERE username='$user' AND balance='$balance'";
$result = $conn->query($sql);
if($result->num_rows ==1){
while($row = $result->fetch_assoc()){
$value=$row['balance'];
if ($value>$amount) {
	# code...

$update_balance=$value-$amount;
echo $update_balance;
}
else{
	echo "<script>alert('Amount bigger than Available Bid')</script>";
	header("location : bidding.php");
	break;
}}
}

 
$conn->close();
?>