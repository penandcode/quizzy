<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($link, $sql);
$numRows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($row['status'] == 'active'){

    if($numRows==1){
        if(password_verify($pass, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['Userid'] = $row['id'];
            $_SESSION['userLogin'] = $email;
            $_SESSION['email'] = $email;
            echo "logged in". $email;
            header("Location:/project/dashboard.php");  
            exit();}
            else{
                $showError = "Wrong Cridentials";
                header("Location: /project/index.php?loginsuccess=false&error=$showError");  
            }
            }
        }
elseif ($row['status'] == 'inactive') {
    $showError = "Activate account";
    header("Location: /project/index.php?loginsuccess=false&error=$showError");  
}
else{
    $showError = "Create Account first";
header("Location: /project/index.php?loginsuccess=false&error=$showError");  
}}?>