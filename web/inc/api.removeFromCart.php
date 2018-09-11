<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();

  // Get the payload
  $dataCartIndex = $_GET['cid'];
  
  // Get the current cart
  $currentCart = [];
  $currentCart = $_SESSION['cart'];
  
  // Remove item from cart array
  unset($currentCart[$dataCartIndex]);
  
  // Set session
  $_SESSION['cart'] = $currentCart;
  
  // Response
  echo json_encode([true, $currentCart]);
?>