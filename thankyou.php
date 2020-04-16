<?php
include("database/connect.php");
include("include/header.php");
?>

  <div class="site-wrap">


    <div class="site-navbar bg-white py-2">

    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            
            <p><a href="pastorders.php" class="btn btn-sm height-auto px-4 py-3 btn-primary">Check my orders</a></p>
          </div>
        </div>
      </div>
    </div>

  </div>


  <?php
  include("include/footer.php");
  ?>