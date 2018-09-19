<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();
  
  // constructs an empty object and then sets the current cart. If the cart is not set, it will return an empty object
  // using objects because an array would automatically turn into an object if you would delete the first (index 0) item
  $currentCart = new stdClass();
  $currentCart = $_SESSION['cart'];
  
  // Response
  echo json_encode([true, $currentCart]);
?>