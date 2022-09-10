<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <h3 class="py-3 text-center">Welcome Admin</h3>

        <div class="container">
            <div class="row text-center">
                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/user.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="user.php" class="btn btn-primary">Users</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/question.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="questions.php" class="btn btn-primary">Questions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/categorization.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="category.php" class="btn btn-primary">Category</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/import.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="import-questions.php" class="btn btn-primary">Import</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/quiz.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="quiz.php" class="btn btn-primary">Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 py-3">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top image-responsive" src="icons/adminpng.png" alt="Card image cap">
                        <div class="card-body">
                            <div>
                                <a href="add-admin.php" class="btn btn-primary">Admins</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>