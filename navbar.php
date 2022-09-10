<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Quizzy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="privacy-policy.php">Privacy Policy</a></li>
                <li class="nav-item"><a class="nav-link" href="terms.php">Terms and Conditions</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success!</strong> Your account has been created. Check your mail and activate your account.
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
</div>';}
if(isset($_GET['reset-success']) && $_GET['reset-success'] == "false" && $_GET['error'] == "Email don't exist in database"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Sorry! </strong> Email does not exist in database
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['reset-success']) && $_GET['reset-success'] == "true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success! </strong> Reset verification email sent.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';} 
if(isset($_GET['activate-success']) && $_GET['activate-success'] == "true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success! </strong> Account verified.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['activate-success']) && $_GET['activate-success'] == "false" && $_GET['error'] == "Something went wrong"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Ghosh! </strong> Something went wrong.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" && $_GET['error'] == "Wrong Cridentials"){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Sorry! </strong> Wrong Cridentials
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</button>
</div>';}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" && $_GET['error'] == "Create Account first"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry! </strong> Create Account first
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>';}
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false" && $_GET['error'] == "Activate account"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Sorry! </strong> Activate your account.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        </div>';}

        if(isset($_GET['msg']) && $_GET['msg'] == "Profile Updated"){
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Wow! </strong>Profile has been updated. Login Again. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            </div>';}


    ?>