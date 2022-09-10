<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($link, $sql);
$numRows = mysqli_num_rows($result);
if($numRows==1){
$row = mysqli_fetch_assoc($result);
if($password == $row['password']){
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['id'] = $row['id'];
$_SESSION['userLogin'] = $username;
$_SESSION['email'] = $username;
echo "logged in". $username;
header("Location: /project/admin/dashboard.php");  
echo 'Success';
exit();
} 
else{
$showError = "Wrong Cridentials";
}
header("Location: /project/admin/login.php?loginsuccess=false&error=$showError");  
}
else{
$showError = "Wrong Cridentials";
header("Location: /project/admin/login.php?loginsuccess=false&error=$showError");     
}}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-dark navbar-dark">
<div class="container-fluid">
<a class="navbar-brand" href="/project/index.php">Quizzy</a>
</div>
</nav>
<?php 
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" && $_GET['error'] == "Wrong Cridentials"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Sorry! </strong> Wrong Cridentials
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>
';}?>
<div class="container my-4">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="row mb-3">
<label for="username" class="col-sm-2 col-form-label">Username</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="admin" placeholder="Username" name="username"
aria-describedby="emailHelp">
</div>
</div>
<div class="row mb-3">
<label for="Password" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password" placeholder="Password" name="password">
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
</body>
</html>
<?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success!</strong>Your account has been created.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && $_GET['error'] == "Email already exists."){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Failed!</strong> Email Already Exists.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && $_GET['error'] == "Passwords do not match"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Failed!</strong> Passwords do not match.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && $_GET['error'] == "Length too small"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Failed!</strong> Password is too small.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}?>