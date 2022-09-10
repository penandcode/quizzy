<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Quizzy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
                <li class="nav-item"><a class="nav-link">Leaderboard</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
if(isset($_GET['msg']) && $_GET['msg'] == "Already Given"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Hey!</strong> You have already given the quiz;
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>';}

?>