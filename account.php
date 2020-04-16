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

		$sqladmin = "SELECT role from user where email='" . $email . "'";
		$queryadmin = mysqli_query($conn, $sqladmin);
		$rowadmin = mysqli_fetch_assoc($queryadmin);

		$role = $rowadmin['role'];


		if ($passwordCorrect) {
			$_SESSION["email"] = $email;
			if ($role == 0) {
				echo " <p style='color: blue; font-style: all;padding: 2rem; font-size: 1.5rem;text-align:center;'>Success! </p> <script>window.location = 'index.php'</script>";
			} else {
				echo " <p style='color: blue; font-style: all;padding: 2rem; font-size: 1.5rem;text-align: center'>Success! </p> <script>window.location = 'admin/dashboard.php'</script>";
			}
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
		<input type="email" class="form-control" id="login" name="email" aria-describedby="emailHelp" placeholder="Enter email">
	</div><br>
	<div class="form-group" style="width: 50%; margin: auto;">
		<label>Password</label>
		<input type="password" class="form-control" id="login" name="password" placeholder="Password">
	</div><br>
	<div class="form-check"  style="width: 50%; margin: auto;">
	<button type="submit" class="btn btn-primary" name="login">Submit</button>
	<!-- <a href='register.php'>Signup</a> -->
	<p style="float: right;">New User? <a href="sign-up.php">Signup</a></p>
	</div>
</form>
<?php
include("include/footer.php");

?>