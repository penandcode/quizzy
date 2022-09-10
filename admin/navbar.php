<nav class="navbar bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Admin's Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboard.php">Home</a></li>
                    <li class="nav-item text-dark"><a class="nav-link" href="user.php">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="questions.php">Questions</a></li>
                    <li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="import-questions.php">Import Questions</a></li>
                    <li class="nav-item"><a class="nav-link" href="add-admin.php">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="quiz.php">Quiz</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php include '../partials/_editCatModal.php'; ?>
<?php include 'auth.php'; ?>
<?php
if (isset($_GET['msg']) && $_GET['msg'] == "Write Correct Answer") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Write Correct Option in Answer.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Something Went Wrong!") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Sorry! </strong>Something Went Wrong.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Question Added") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Wow! </strong>Question has been added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Account not Created") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Account not created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if(isset($_GET['msg']) && $_GET['msg'] == "Account Created"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Wow! </strong>Account has been created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Question already exists.") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Question Already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Category already exists.") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Category Already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "No file selected") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>No file is selected.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Wrong file type") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>File chosen is wrong.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Something went wrong") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Something went wrong.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Category Added") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Wow! </strong>Category has been added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == "Username already exists") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Username Already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
// if (isset($_GET['msg']) && $_GET['msg'] == "Account Created") {
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//         <strong>Wow! </strong>Account has been created.
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
//         </button>
//         </div>';
// }
if (isset($_GET['msg']) && $_GET['msg'] == "Account not Created") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Oops! </strong>Account not created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';
}
?>