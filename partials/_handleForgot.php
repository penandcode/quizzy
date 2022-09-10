<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$email = trim($_POST['email']);
$existSql = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($link, $existSql);
$numRows = mysqli_num_rows($result);
if($numRows>0){
$to_email = $email;
$subject = "Reset password";
$body = "Hi, Reset your account by clicking on this" ;
$headers = "From: rajputlakshit0@gmail.com";
if (mail($to_email, $subject, $body, $headers)) {
echo 'Email Sent';
$showAlert = true;
header("Location: /project/index.php?reset-success=true");
exit();
} else {
$showError = "Email sending failed...";
}}
else{
$showError = "Email don't exist in database";
header("Location: /project/index.php?reset-success=false&error=$showError");
}}?>