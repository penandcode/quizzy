<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="signupModalLabel">Signup</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/project/partials/_handleSignup.php" method="post">
<div class="modal-body my-3">
<div class="form-group">
<label for="exampleInput1">Name</label>
<input type="text" class="form-control" id="name" name="name">
</div>
<div class="form-group my-3">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
else.</small>
</div>
<div class="form-group my-3">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="password" name="password">
</div>
<div class="form-group my-3">
<label for="exampleInputPassword1">Confirm Password</label>
<input type="password" class="form-control" id="password" name="cpassword">
</div>
<button type="submit" class="btn btn-primary my-3">Signup</button>
</div>  
</form>
</div></div></div>