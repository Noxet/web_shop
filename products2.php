<?php
	require_once "connection.php";
?>
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
		<td><a href="index.php?page=products2&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a></td>
	</tr>
	<?php
		}
	?>
	
</table>