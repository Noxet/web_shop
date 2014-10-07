<!DOCTYPE html>

<?php include 'header.php'; ?>

<?php
	require_once 'connection.php';

	$error='';

	if (isset($_POST['submit'])) {
		if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
			$error = "You need to fill out all forms";
		} else {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$msg = $_POST['message'];

			$query = mysqli_query($con, "insert into `user_rates` values(NULL, '$name', '$email', '$msg')");
			if (!$query) {
				$error = "Something went wrong, please contact our support";
			}
		}
	}
?>

<body>
		
		<?php include 'left_side.php'; ?>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">Rate Us!</h1>
				<div class="row">

                    <div class="col-sm-7 col-md-7">
                        <form action="" method="post">

                            <div class="form-group">
                                <input type="text" id="rate_name" name="name" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="rate_email" name="email" class="form-control" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <textarea id="rate_message" name="message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning">Send</button>

                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
			<div class="error"><p><?php echo $error; ?></p></div>

			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">User Comments</h1>
				
				<?php
					$query = "select * from user_rates order by id desc limit 3";
					$res = mysqli_query($con, $query);
				?>
				
				<?php
					while ($row = mysqli_fetch_assoc($res)) {
						echo '<article class="templatemo-item">';
						echo "<p>User: <b>{$row['name']}</b></br>";
						echo "Email: {$row['email']}</p>";
						echo "<p>Comment: {$row['message']}</p>";
					}
				?>

			</div>	
				
				
			<?php include 'footer.php'; ?>
			</div>

		</div> <!-- right section -->
	</div>
</body>
</html>
