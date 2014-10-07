<!DOCTYPE html>

<?php
	require_once 'connection.php';
	include 'header.php';

	$_SESSION['total'] = 0;
	$message = '';
	if(isset($_GET['action']) && $_GET['action'] == "add"){
		$id = intval($_GET['id']);
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		}else{
			$sql2 = "SELECT * FROM products WHERE id={$id}";
			$query2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($query2) != 0){
				$row2 = mysqli_fetch_array($query2);
				$_SESSION['cart'][$row2['id']] = array("quantity" => 1, "price" => $row2['price']);
			}else{
				$message = "This prodct is invalid";
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == "empty"){
		$_SESSION['cart'] = null;
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

				<?php echo $message; ?>
				
				<?php
					while ($row = mysqli_fetch_assoc($res)) {
						echo '<article class="templatemo-item">';
						echo "<h2>{$row['name']}</h2>";
						echo "<img src={$row['image']} alt={$row['name']} class=\"img-thumbnail\" width=\"200\" height=\"200\">";
						echo "<p>{$row['description']}</p>";
						echo "<p>Price: <b>{$row['price']}</b> SEK</p>";
						echo "<a href=\"products.php?action=add&id={$row['id']}\" class=\"btn btn-warning\">Buy</a>";

					}
				?>

			<?php include 'footer.php'; ?>

			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
