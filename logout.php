<?php
session_start();
if(session_destroy()){ // Destroying All Sessions {
header("Location: indexx.php"); // Redirecting To Home Page
}
?>