<div class="modal fade" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="signupModalLabel">Forgot Password</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/project/partials/_handleForgot.php" method="post">
<div class="modal-body my-3">
<div class="form-group my-3">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
</div>
<button type="submit" class="btn btn-primary my-3">Reset Password</button>
</div>
</form>
</div></div></div>