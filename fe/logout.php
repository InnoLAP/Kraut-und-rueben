<?php
  session_start();
  unset($_SESSION['customerId']);
  session_destroy();
  header("location:login.php");
?>
