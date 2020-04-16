<?php
 session_start();
 $_SESSION['admin']="";
  echo " <center><p style='color: blue; font-style: all;'>Success! </p></center>; <script>window.location = 'index.php'</script>";
  session_destroy();
?>