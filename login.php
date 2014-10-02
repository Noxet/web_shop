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
						 <input type="text" class="form-control" name="username" 
							placeholder="John Doe">
					  </div>
				   </div>
				   <div class="form-group">
					  <label for="lastname" class="col-sm-2 control-label">Password</label>
					  <div class="col-sm-10">
						 <input type="password" class="form-control" name="password" 
							placeholder="********">
					  </div>
				   </div>
				   <div class="form-group">
					  <div class="col-sm-offset-2 col-sm-10">
						 <input type="submit" name="submit" class="btn btn-primary" value=" Log In ">
					  </div>
				   </div>
				</form>
				<?php echo '<div class="error">' . $error . '</div>'; ?>
				<?php echo '<div class="success">' . $success . '</div>'; ?>
				<?php include 'footer.php'; ?>
			</div>	
		</div>
	</div>	
</body>
</html>
