<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
        include 'header.php'
    ?>
    <div class="container">
        <h3 class="py-3 text-center">Welcome, <?php echo $_SESSION['userLogin'];?></h3>


        <div class="container py-3">
            <div class="row">
                <div class="col-sm text-center">
                    <div class="card" style="width: 9rem;">
                        <img class="card-img-top" src="admin/icons/question.png" style="max-width:150px;"
                            alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="quiz.php" class="btn btn-primary">Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm text-center">
                    <div class="card" style="width: 9rem;">
                        <img class="card-img-top" src="admin/icons/leaderboard.png" style="max-width:150px;"
                            alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="leaderboard.php" class="btn btn-primary">Leaderboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm text-center">
                    <div class="card" style="width: 9rem;">
                        <img class="card-img-top" src="admin/icons/profile.png" style="max-width:150px;"
                            alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="profile.php" class="btn btn-primary">Profile</a>
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
</body>

</html>