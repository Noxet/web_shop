<!DOCTYPE html>

<?php include 'sign_up.php'; ?>
<?php include 'header.php';?>

<body>
	<!-- left side -->
	<?php include 'left_side.php'; ?>

	<script src="js/check_input.js"></script>

		 <!-- left section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">			
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Sign Up</h1>
				<form class="form-horizontal" role="form" action="" method="POST">
				   <div class="form-group">
					  <label for="firstname" class="col-sm-3 control-label">Username</label>
					  <div class="col-sm-7">
						 <input type="text" class="form-control" id="username" name="username">
					  </div>
					  <div id="check_available" class="col-sm-2">
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="lastname" class="col-sm-3 control-label">Password</label>
					  <div class="col-sm-7">
						 <input type="password" class="form-control" name="password">
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="lastname" class="col-sm-3 control-label">Confirm password</label>
					  <div class="col-sm-7">
						 <input type="password" class="form-control" name="cpassword">
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="home" class="col-sm-3 control-label">Home address</label>
					  <div class="col-sm-7">
						 <input type="test" class="form-control" name="home">
					  </div>
				   </div>
				   <div class="form-group">
					  <div class="col-sm-offset-3 col-sm-10">
						 <input type="submit" name="submit" class="btn btn-primary" value=" Sign Up ">
					  </div>
				   </div>
				</form>
				<?php echo '<div class="error">' . $error . '</div>'; ?>
				<?php echo '<div class="success">' . $success . '</div>'; ?>
				<?php include 'footer.php'; ?>
			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
