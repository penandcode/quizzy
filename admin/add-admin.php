<?php
include 'dbconnect.php';
if(isset($_POST['submit'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if(!empty($username) && !empty($password)){
$existSql = "SELECT * FROM `admin` WHERE username = '$username'";
$result = mysqli_query($link, $existSql);
$numRows = mysqli_num_rows($result);
if($numRows>0){
$em = "Username already exists";
header("Location: ../admin/add-admin.php?msg=$em");
}
else{
$sql = "INSERT INTO `admin` (`username`, `password`) VALUES ('$username', '$password')";
$result = mysqli_query($link, $sql);
if($result){
$em = "Account Created";
header("Location: ../admin/add-admin.php?msg=$em");
}
else{
$em = "Account not Created";
header("Location: ../admin/add-admin.php?msg=$em");
}
}
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php';?>
    <div class="container my-4">
        <form action="add-admin.php" method="POST">
            <div class="mb-3">
                <label for="inputUserName" class="form-label">Userame</label>
                <input type="text" class="form-control" name="username" id="inputUserName">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="inputPassword" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container py-5">
        <div class="row py-5">
            <h3>Admins</h3>
            <h6 class="text-muted">View/Delete</h6>
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <table id="admin_table" style="width:100%" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <!-- <th scope="col">Edit</th> -->
                                        <th scope="col">Delete</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$sql = "SELECT * FROM `admin`";
$result = mysqli_query($link, $sql);
$sr = 0;
while ($row = mysqli_fetch_array($result)) {
$id = $row['id'];
$username = $row['username'];
$password = $row['password'];
echo '<tr>';
echo '<td>'.++$sr.'</td>';
echo '<td>'.$username.'</td>';
echo '<td>'.$password.'</td>';
echo "<td><a href='../partials/_delAdmin.php?id=".$id."' type='button'
class='btn btn-default btn-outline-danger' name='delete_question'
aria-label='Left Align'>🗑</a></td>";
echo '</tr>';
                                }?> </tbody>
                            </table>
                        </div>
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
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
    <script>
    $(function() {
        $(document).ready(function() {
            $('#admin_table').DataTable();
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