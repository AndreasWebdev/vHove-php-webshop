<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();
  
  // Get the current cart
  $currentCart = new stdClass();
  $currentCart = $_SESSION['cart'];
  
  // Response
  echo json_encode([true, $currentCart]);
?>