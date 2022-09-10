<?php
    include 'header.php';
    include 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_d = $_SESSION['Userid'];
    echo "d";
    $sql = "UPDATE `user` SET `name`='$name', `email`='$email' WHERE `id`='$user_d'";
    $result = mysqli_query($link, $sql);
    if($result){
        session_unset();
        $msg = "Profile Updated";
        header("Location: index.php?msg=$msg");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="bg-">
    <?php
        $user = $_SESSION['userLogin'];
        $sql1 = "SELECT * FROM `user` WHERE `email`='$user'";
        $result1 = mysqli_query($link, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $id = $row1['id'];
        $name = $row1['name'];
        $email = $row1['email'];
    ?>
    <div class="container py-3">
        <div class="container py-3">
            <div class="row">
                <div class="col-sm text-center">
                    <div class="card text-center">
                        <div class="text-center">
                            <img src="admin/icons/user.png" style="width:250px;" class="img-fluid">
                        </div>
                        <form action="profile.php" method="POST">
                            <div class="card-body mb-3">
                                <div class="row g-3 align-items-center py-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label">Name</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" required class="form-control" name="name"
                                            value="<?php echo $name;?>">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center py-3">
                                    <div class="col">
                                        <label for="name" class="col-form-label">Email</label>
                                    </div>
                                    <div class="col">
                                        <input type="email" required class="form-control" name="email"
                                            value="<?php echo $user?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>