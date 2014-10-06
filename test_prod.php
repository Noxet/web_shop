<?php
require_once "connection.php";
$_SESSION['total'] = 0;
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
<h2 class="message"> <?php if(isset($message)){echo $message;}?></h2>
<h1>Product Page</h1>
<table>
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	<?php
	$sql = "SELECT * FROM products ORDER BY name ASC";
	$query = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($query)){
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td><?php echo $row['price'] . " SEK"; ?></td>
			<td><a href="products2.php?&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a></td>
		</tr>
		<?php
	}
	?>
</table>
<td><a href="products2.php?&action=empty">Empty cart</a></td>

<h1>cart</h1>
<?php
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
	$_SESSION['total'] = $_SESSION['total'] + $row['price'] * $_SESSION['cart'][$row['id']]['quantity'];
}
}else{
	echo "<p>Your cart is empty. <br />Pleae add some products</p>";
}
echo $_SESSION['total'];
echo "<a href='checkout.php'>Go to checkout</a>";
?>
