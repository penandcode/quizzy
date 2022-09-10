<?php
include 'dbconnect.php';
if(isset($_POST['submit'])){
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$token = bin2hex(random_bytes(15));
if(!empty($name) && !empty($password) && !empty($email)){
$existSql = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($link, $existSql);
$numRows = mysqli_num_rows($result);
if($numRows>0){
$em = "Email already exists";
header("Location: ../admin/user.php?msg=$em");
}
else{
$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO `user` (`name`, `email`, `password`, `token`, `status`, `timestamp`) VALUES ('$name', '$email', '$hash', '$token', 'active',current_timestamp())";
$result = mysqli_query($link, $sql);
if($result){
$em = "Account Created";
header("Location: ../admin/user.php?msg=$em");
}
else{
$em = "Account not Created";
header("Location: ../admin/user.php?msg=$em");
}}}}?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php';?>
    <div class="container py-4">
        <div class="container my-5">
            <form action="user.php" method="POST">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="inputName">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inputPassword" name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <table id="user_table" style="width:100%" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
$sql = "SELECT * from `user`";
$result = mysqli_query($link, $sql);
$sr = 0;
while ($row = mysqli_fetch_array($result)){
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$active = $row['status'];
echo '<tr>';
echo '<td>'.++$sr.'</td>';
echo '<td>'.$name.'</td>';
echo '<td>'.$email.'</td>';
echo '<td>'.$active.'</td>';
echo '<td><a href="../partials/_delUser.php?id='.$id.'"
                                    type="button" class="btn btn-default btn-outline-danger"
                                    name="delete_user" aria-label="Left Align">🗑</a></td>';
                                    }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script>
    $(function() {
        $(document).ready(function() {
            $('#user_table').DataTable();
        });
    });
    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>