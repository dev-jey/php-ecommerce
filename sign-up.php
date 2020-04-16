<?php
include("include/header.php");
include("database/connect.php");

?>
<?php
if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$sql = "SELECT email FROM user where email='" . $email . "'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($res);
	if ($name && $password && $password2) {
		if (strlen($name) < 30) {
			if ($res->num_rows === 0) {
				if (strlen(trim($password)) < 15 && strlen(trim($password)) > 6) {
					if ($password == $password2) {
						$hashpassword = password_hash($password, PASSWORD_BCRYPT);
						$sql = "INSERT INTO user (username, firstname, lastname, email, gender, phone, country, password, role)
							VALUES ('$name','$firstname', '$lastname', '$email','$gender','$phone', '$country', '$hashpassword', 0)";
						$result = mysqli_query($conn, $sql);
						echo "<center><p style='color: red; font-style: all;'><b>Registration Complete!</b> <a href='account.php'>Click here to login</a></p></center>";
					} else {
						echo "<center><p style='color: red; font-style: all;'>*Passwords must match</p></center>";
					}
				} else {
					echo "<center><p style='color: red; font-style: all;'>*Your password must be between 6 to 15 characters</p></center>";
				}
			} else {
				echo "<center><p style='color: red; font-style: all;'>*Email already in use</p></center>";
			}
		} else {
			echo "<center><p style='color: red; font-style: all;'>*Your name is too long</p></center>";
		}
	}
}

?>
<form id='registerform' method='POST' action='sign-up.php' style="padding: 6rem;">
	<label>
		<h3>
			<center>Signup Here</center>
		</h3>
	</label>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Username</label>
			<input type="text" name="name" class="form-control" id="name" placeholder="Username" required>
		</div>

		<div class="form-group">
			<div class="col-md-6">
				<label> <strong>First name:</strong></label><br>
				<input type="text" class="form-control" id="fname" name="firstname" placeholder="Your First name" required><br>

			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6">
				<label><strong>Last name:</strong></label><br>
				<input type="text" class="form-control" id="lname" name="lastname" placeholder="Meshal" required><br>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label for="country" class="text-black">Country <span class="text-danger">*</span></label>
			<select id="country" class="form-control" name="country">
				<option value="1" disabled>Select a country</option>
				<option value="KSA">Saudi Arabia 🇸🇦</option>
				<option value="BH">Bahrain 🇧🇭</option>
				<option value="KWT">Kuwait 🇰🇼</option>
				<option value="UAE">Emirates 🇦🇪</option>
				<option value="USA">United States 🇺🇸</option>
				<option value="UK">United Kingdom 🇬🇧</option>

			</select>
		</div>

		<div class="form-group col-md-6">
			<label> <strong>Enter a phone number:</strong></label><br>
			<input type="tel" id="phone" name="phone" placeholder="572-144-0334" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
		</div>

		<div class="form-group col-md-6">
			<label>Email</label>
			<input type="email" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}" class="form-control" id="email" placeholder="name@email.something" required>
		</div>
	</div>

	<div class="form-group col-md-6">
		<label>Select Gender</label>
		<br>
		<input type='radio' name='gender' value='M' checked> Male
		<br>
		<input type='radio' name='gender' value='F'> Female
		<br>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Password</label>
			<input type="Password" name="password" class="form-control" id="password" required>
		</div>
		<div class="form-group col-md-6">
			<label>Retype Password</label>
			<input type="Password" class="form-control" name="password2" id="password2" required>
		</div>
	</div>
	<div class="form-group">
		<div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" required> Agree to terms & conditions
			</label>
		</div>
	</div>
	<input type="submit" name="register" class="btn btn-primary btn-lg" value="Sign Up">
</form>
<?php
$conn->close();
include("include/footer.php");
?>