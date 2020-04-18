<?php
include("include/header.php");
include("database/connect.php");


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT AdminUsername, password FROM admin WHERE AdminUsername= '" . $email . "' and password='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION["admin"] = $row['AdminUsername'];
        echo '<script>window.location="adminhome.php"</script>';
    } else {
        echo "<p style='color: red; font-style: all;padding: 2rem; font-size: 1.5rem;text-align: center'>Check your credentials! </p>";
    }
}
?>
<form class="loginform" action="admin.php" method="POST" style="padding: 2rem;">
    <div class="form-group" style="width: 50%; margin: auto;">
        <label>Admin username</label>
        <input type="text" class="form-control" id="login" name="email" aria-describedby="emailHelp" placeholder="Enter admin username">
    </div><br>
    <div class="form-group" style="width: 50%; margin: auto;">
        <label>Password</label>
        <input type="password" class="form-control" id="login" name="password" placeholder="Password">
    </div><br>
    <div class="form-check" style="width: 50%; margin: auto;">
        <button type="submit" class="btn btn-primary" name="login">Submit</button>
    </div>
</form>
<?php
include("include/footer.php");

?>