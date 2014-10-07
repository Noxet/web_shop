<!DOCTYPE html>

<?php
	require_once 'connection.php';
	include 'header.php';
?>

<body>
		
		<?php include 'left_side.php'; ?>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Checkout</h1>

				<?php
					$message = "";

					if (isset($_SESSION['cartman'])) {
						foreach($_SESSION['cartman'] as $id => $prod) {
							echo "<b>{$prod['name']}</b> </br> {$prod['quantity']} : {$prod['price']} SEK </br>";
						}

						echo "</br><b>Total:</b> {$_SESSION['total']} SEK";
					} else {
						$message = "Your cart is empty, please come again";
					}

					echo $message;
				?>	

			<?php include 'footer.php'; ?>

			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
