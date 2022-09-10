<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$cpass = trim($_POST['cpassword']);
$token = bin2hex(random_bytes(15));
$existSql = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($link, $existSql);
$numRows = mysqli_num_rows($result);
if($numRows>0){
$showError = "Email already exists.";
}
else{
if(strlen($pass)<8){
$showError = "Length too small";
}
elseif($pass == $cpass){
$hash = password_hash($pass, PASSWORD_DEFAULT);
$sql = "INSERT INTO `user` (`name`, `email`, `password`, `token`, `status`, `timestamp`) VALUES ('$name', '$email', '$hash', '$token', 'inactive',current_timestamp())";
$result = mysqli_query($link, $sql);
if($result){
$to_email = $email;
$subject = "Account Verification for quizzy";
$body = "Hi, Your account has been created. Verify your account by clicking on link http://localhost/project/activate.php?token=$token" ;
$headers = "From: rajputlakshit0@gmail.com";
if (mail($to_email, $subject, $body, $headers)) {
$showError = "Email successfully sent to $to_email...";
} else {
$showError = "Email sending failed...";
}
$showAlert = true;
header("Location: /project/index.php?signupsuccess=true");
exit();
}}
else{
$showError = "Passwords do not match";  
}}
header("Location: /project/index.php?signupsuccess=false&error=$showError");
}?>