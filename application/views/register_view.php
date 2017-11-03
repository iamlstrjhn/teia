<?php include 'header_view.php' ?>
<div class="container">
	<h3>Register</h3>
	<form method=POST action="/register">
		<div class="form-group">
			<input type="text" required class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<input type="password" required class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
	    <label for="exampleFormControlSelect2">Account Type</label>
	    <select class="form-control" required  name="type">
	      <option value = "student">Student</option>
	      <option value = "admin">Admin</option>
	    </select>
	  </div>
		<button type="submit" class="btn btn-primary">Register</button>
		
		
	</form>
</div>

<?php include 'footer_view.php' ?>