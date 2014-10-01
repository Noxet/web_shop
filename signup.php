<!DOCTYPE html>

<?php include 'log_in.php'; ?>
<?php include 'header.php';?>

<body>
	<!-- left side -->
	<?php include 'left_side.php'; ?>

		 <!-- left section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">			
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Log In</h1>
				<form class="form-horizontal" role="form" action="" method="POST">
				   <div class="form-group">
					  <label for="firstname" class="col-sm-2 control-label">Username</label>
					  <div class="col-sm-8">
						 <input type="text" class="form-control" name="username">
					  </div>
					  <div class="col-sm-2">
					  	<?php
							echo "hej";
						?>
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="lastname" class="col-sm-2 control-label">Password</label>
					  <div class="col-sm-8">
						 <input type="password" class="form-control" name="password">
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="lastname" class="col-sm-2 control-label">Re-type password</label>
					  <div class="col-sm-8">
						 <input type="password" class="form-control" name="repassword">
					  </div>
				   </div>
				   <div class="form-group">
					  <div class="col-sm-offset-2 col-sm-10">
						 <input type="submit" name="submit" class="btn btn-primary" value=" Sign Up ">
					  </div>
				   </div>
				</form>
				<?php echo '<div id="login_error">' . $error . '</div>'; ?>
				<?php include 'footer.php'; ?>
			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
