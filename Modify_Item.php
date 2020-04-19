<!--Reema sectin-->

<?php
include("include/adminheader.php");
?>

	<form action="Modify_Item.php" method="POST">

	
	<div class="col-md-6 animate-box">

					<hr><h3>Search for product to modify or delete</h3><hr>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
	
    <p> In order to search, modify or delete a product data, Please fill Item Id field in the form below </p>
	<hr>
	<?php

   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "stones";
   
    $Item_id = "";
	$Item_color = "";
	$Item_category = "";
	$Item_price = "";
	$Item_size = "";
	$Stone_type = ""; 
   
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
   
   try {
	
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   }catch(MuSQLi_sql_Exception $ex){
	echo ("error in connecting");
	}
	
	function getData(){
	
	$data = array();
	$data[0] = $_POST['Item_id'];
	$data[1] = $_POST['Item_color'];
	$data[2] = $_POST['Item_category']; 
	$data[3] = $_POST['Item_price'];
	$data[4] = $_POST['Item_size'];
	$data[5] = $_POST['Stone_type'];
	 return $data;
	}
	// search 
	if ( isset($_POST['search']))
	{
		
		$info = getData();
		$search_query = "SELECT * FROM `item` WHERE Item_id = '$info[0]'";
		$search_result = mysqli_query($connect, $search_query);
			if ($search_result)
			{
				if(mysqli_num_rows($search_result))
				{
					while( $rows = mysqli_fetch_array($search_result)) 
					{
							$Item_id = $rows['Item_id'];
							$Item_color= $rows['Item_color'];
							$Item_category = $rows['Item_category']; 
							$Item_price = $rows['Item_price'];
							$Item_size = $rows['Item_size'];
							$Stone_type = $rows['Stone_type'];
					}
				} else{
					echo ("No such Item id is available");
				}
			} else {
				echo("Result error");
			}
	}
	
	//Delete
	
	if(isset($_POST['delete'])){
		$info = getData();
		$delete_query = "DELETE FROM `item` WHERE Item_id = '$info[0]'";
		try{
			$delete_result = mysqli_query($connect, $delete_query);
			if($delete_result){
				if(mysqli_affected_rows($connect)>0){
					echo("Item been deleted Successfully !");
				}else{
					echo ("There is an error to delete an item");
				}
			}
		}catch(Exception $ex){
			echo("Error in delete !".$ex->getMessage());
	}}
	
	//Update
	if (isset($_POST['update'])){
		$info = getData();
		$update_query = "UPDATE `item` SET `Item_color`='$info[1]',`Item_category`= '$info[2]',`Item_price`='$info[3]',`Item_size`='$info[4]',`Stone_type`='$info[5]' WHERE Item_id = '$info[0]'";
			try{
			$update_result = mysqli_query($connect, $update_query);
			if($update_result){
				if(mysqli_affected_rows($connect)>0){
					echo("Item been Updated Successfully !");
				}else{
					echo ("There is an error to update item");
				}
			}
		}catch(Exception $ex){
			echo("Error in update !".$ex->getMessage());
	}}
	?>
            <div class="row form-group">
							<div class="col-md-12">
           <label> <strong> Item id :</strong></label><br>
  <input type="text" id=" item id " name="Item_id" placeholder=" ex.123456" value ="<?php echo($Item_id);?>" ><br>

							</div>
                </div>

                            <div class="row form-group">
							<div class="col-md-12">
							
								<label><strong> Item color :</strong></label><br>
								
    <label><input name= "Item_color" type = "text" placeholder=" color of the item" value ="<?php echo($Item_color);?>"></label>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label><strong> Item Category :</strong></label><br>
								
    <label><input name= "Item_category" type = "text" placeholder=" Category of the item" value ="<?php echo($Item_category);?>"></label>
  
							</div>
						</div>


                        <div class="row form-group">
							<div class="col-md-12">
							      <label><strong>Item Price :</strong> </label><br>
    <input type="text" placeholder=" Price of the item" name="Item_price" value ="<?php echo($Item_price);?>"><br>
							</div>
						</div>

                        <div class="row form-group">
							<div class="col-md-12">

   						      <label><strong> Item Size :</strong> </label><br>
    <label><input name= "Item_size" type = "text" placeholder=" Size of the item" value ="<?php echo($Item_size);?>"></label>


							</div>
						</div>


                        <div class="row form-group">
							<div class="col-md-12">
							
    <label><strong>Stone type :</strong></label><br>
	    <label><input name= "Stone_type" type = "text" placeholder=" Stone name" value ="<?php echo($Stone_type);?>"></label>

	
    <hr>
							</div>
						</div>

						<div class="form-group">
							<input type="submit" name="search" value="Search" class="btn btn-primary">
							<input type="submit" name="update" value="Update Item" class="btn btn-primary">
							<input type="submit" name="delete" value="Delete Item" class="btn btn-primary">

						</div>

					</form>
				</div>
			</div>

		</div>
	</div>


<footer id="fh5co-footer" role="contentinfo">
		<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">

					<div class="fh5co-contact-info">
                        <h3>Shine Bright.</h3>
					<p>Shop from here the most beautiful rings, bracelets, necklace and rings, we guarantee for you excellence.</p><hr>
						<h3>Contact Information</h3>
						<ul>
							<li class="phone"><a href="tel://1234567920">+ 966 5678 12367</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>

						</ul>
					</div>

				</div>



		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
