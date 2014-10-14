<!DOCTYPE html>

<?php
	require_once 'connection.php';
	include 'header.php';

	if (!isset($_SESSION['total'])) {
		$_SESSION['total'] = 0;
	}

	$message = '';
	if(isset($_GET['action']) && $_GET['action'] == "add"){
		
		$id = intval($_GET['id']);

		if(isset($_SESSION['cartman'][$id])){
			$_SESSION['cartman'][$id]['quantity']++;
			$_SESSION['total'] += $_SESSION['cartman'][$id]['price'];
		}else{
			
			if ($stmt = mysqli_prepare($con, "SELECT * FROM products WHERE id=?")) {
				mysqli_stmt_bind_param($stmt, "d", $id); // bind the parameters
				mysqli_stmt_execute($stmt); // execute statement
				$res = mysqli_stmt_get_result($stmt); // bind the result
			}

			if(mysqli_num_rows($res) != 0){
				$row = mysqli_fetch_array($res);
				$_SESSION['cartman'][$row['id']] = array("name" => $row['name'], "quantity" => 1, "price" => $row['price']);
				$_SESSION['total'] += $_SESSION['cartman'][$id]['price'];
			}else{
				$message = "This prodct is invalid";
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == "empty"){
		$_SESSION['cartman'] = null;
		$_SESSION['total'] = 0;
	}
?>

<body>
		
		<?php include 'left_side.php'; ?>

		<?php
			$query = "select * from products order by name asc";
			$res = mysqli_query($con, $query);
		?>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			

			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Our Products</h1>
				
				<div class="col-sm-12">
					<ul id="cart">
						<li> <a href="products.php?action=empty" class="btn btn-danger">Empty Cart</a> </li>
						<li> <a href="checkout.php" class="btn btn-info">Checkout</a> </li>
					</ul>
				</div>

				<?php echo $message; ?>
				
				<?php
					while ($row = mysqli_fetch_assoc($res)) {
						echo '<article class="templatemo-item">';
						echo "<h2>{$row['name']}</h2>";
						echo "<img src={$row['image']} alt={$row['name']} class=\"img-thumbnail\" width=\"200\" height=\"200\">";
						echo "<p>{$row['description']}</p>";
						echo "<p>Price: <b>{$row['price']}</b> SEK</p>";
						echo "<a href=\"products.php?action=add&id={$row['id']}\" class=\"btn btn-warning\">Add to cart</a>";
					}
				?>

			<?php include 'footer.php'; ?>

			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
