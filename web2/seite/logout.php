<?php
  session_start();

  include('includes/db.php');

  // Clear the Session and redirect user to index
  session_destroy();
  header("Location: index.php");
?>
