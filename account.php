<?php
include("include/header.php");
include("database/connect.php");


if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];


	$sql = "SELECT email, password FROM user WHERE email= '" . $email . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$pass = $row['password'];

		$passwordCorrect = password_verify($password, $pass);

		$sqladmin = "SELECT username,role from user where email='" . $email . "'";
		$queryadmin = mysqli_query($conn, $sqladmin);
		$rowadmin = mysqli_fetch_assoc($queryadmin);

		$role = $rowadmin['role'];


		if ($passwordCorrect) {
			$_SESSION["email"] = $rowadmin['username'];
			echo " <p style='color: blue; font-style: all;padding: 2rem; font-size: 1.5rem;text-align:center;'>Success! </p> <script>window.location = 'index.php'</script>";
		} else {
			echo "<p style='color: red; font-style: all;padding: 2rem; font-size: 1.5rem;text-align: center'>Check your credentials! </p>";
		}
	} else {
		echo "<p style='color: red; font-style: all;padding: 2rem; font-size: 1.5rem;text-align: center'>Check your credentials! </p>";
	}
}
?>
<form class="loginform" action="account.php" method="POST" style="padding: 2rem;">
	<div class="form-group" style="width: 50%; margin: auto;">
		<label>Email address</label>
		<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
	</div><br>
	<div class="form-group" style="width: 50%; margin: auto;">
		<label>Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Password">
	</div><br>
	<div class="form-check" style="width: 50%; margin: auto;">

		<button class="btn btn-dark" style="border: 1px solid silver" type="reset">Clear</button>
		<button type="submit" class="btn btn-primary" name="login">Submit</button>
		<!-- <a href='register.php'>Signup</a> -->
		<p style="float: right;">New User? <a href="sign-up.php">Signup</a></p>
	</div>
</form>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$().ready(function() {
		<?php foreach ($_POST as $fieldName => $fieldValue) : ?>
			$("#<?php echo $fieldName; ?>").val("<?php echo htmlspecialchars($fieldValue); ?>");
		<?php endforeach; ?>
	});
</script>
<?php
include("include/footer.php");

?>