<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();
  
  // constructs an empty object sets it to the current cart
  // using objects because an array would automatically turn into an object if you would delete the first (index 0) item
  $_SESSION['cart'] = new stdClass();
  $currentCart = new stdClass();
  
  // Response
  echo json_encode([true, $currentCart]);
?>