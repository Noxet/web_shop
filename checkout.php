<h1>Checkout</h1>
<?php
require_once "connection.php";
$sql = "SELECT * FROM products ORDER BY name ASC";
$query = mysqli_query($con, $sql);
if(isset($_SESSION['cart'])){
	$sql = "SELECT * FROM products WHERE id IN (";
		foreach($_SESSION['cart'] as $id => $value){
			$sql .= $id . ",";
		}
		$sql = substr($sql,0,-1) . ") ORDER BY id ASC";
$query = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($query)){
	?> 
	<p><?php echo $row['name']; ?> <?php echo " x" . $_SESSION['cart'][$row['id']]['quantity'];?></p>
	<?php
}
}else{
	echo "<p>Your cart is empty. <br />Pleae add some products</p>";
}
echo "Total: " . $_SESSION['total'];
?>
