

<?php
session_start();
$showError = "false";
include 'dbconnect.php';
if(isset($_GET['token'])){
$token = $_GET['token'];
$updatequery = "UPDATE user SET status='active' WHERE token='$token'";
$query = mysqli_query($link, $updatequery);
if($query){
$showAlert = true;
echo 'Done';
header("Location: /project/index.php?activate-success=true");
exit();}
else{
$showError = "Something went wrong";
echo 'Not';
header("Location: /project/index.php?activate-success=false&error=$showError");
}}?>