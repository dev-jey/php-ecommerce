<?php
include("database/connect.php");
include("include/header.php");
 ?>
      <style type="text/css">

* {box-sizing: border-box;}

 .column {
   float: right;
   width: 35%;
   padding: 5px;

 }

 /* Clearfix (clear floats) */
 .row:after {
   content: "";
   display: table;
 }

</style>

    <h1 style = "font-size: 40px; text-align: center; "><strong>Stone types</strong></h1>

       <div class="row">
       <?php
				$query1 = 'SELECT * FROM stone_type';
				$results = mysqli_query($conn,$query1);
				while ($rows = mysqli_fetch_assoc($results)){ 
					?>
           <div class="column">

         <img src="<?php echo $rows['image']; ?>" width="100" style="position:relative;"
              alt= "black stone">
              <br><br>
              
              <h5><?php echo $rows['name']; ?></h5>
       <p style= "width: 60%; height: 200px;";><?php echo $rows['description']; ?></p>

              </div>

				   <?php
				}
?>
<?php 
include("include/footer.php");
 ?>