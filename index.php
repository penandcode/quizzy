
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quizzy</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="./partials/assets/favicon.ico">
<style>
mn{
min-height: 433px;
}
</style>
</head>
<body>
<?php 
include 'navbar.php';
include 'partials/_signupModal.php';
include 'partials/_loginModal.php';
?>
<div class="bg-dark text-secondary px-4 py-5 text-center">
<div class="py-5">
<h1 class="display-5 fw-bold text-white">Quizzy</h1>
<div class="col-lg-6 mx-auto">
<p class="fs-5 mb-4">Be ready. Be smart. Be noticed!<br>Test your aptitude skills.</p>
<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<button type="button" class="btn btn-outline-light btn-lg px-4 me-sm-3" data-bs-toggle="modal"
data-bs-target="#signupModal">Signup</button>
<button type="button" class="btn btn-outline-light btn-lg px-4 me-sm-3" data-bs-toggle="modal"
data-bs-target="#loginModal">Login</button>
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
</body>
</html>


