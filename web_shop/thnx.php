<!DOCTYPE html>

<?php 
	require_once 'connection.php';
	include 'header.php';

	// clear user data
	$_SESSION['cartman'] = null;
	$_SESSION['total'] = 0;

?>

<body>
	<!-- left side -->
	<?php include 'left_side.php'; ?>

		 <!-- right section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">			
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Thank you for purchasing at Ma' Baker's web shop</h1>
				<article class="templato-item">
				<img src="images/ma.jpg" class="img-thummbnail">
				</article>
				
				<br>
				<a href="index.php" class="btn btn-primary">Return Home</a>

				<?php include 'footer.php'; ?>
			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
