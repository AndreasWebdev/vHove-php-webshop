<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();

  // Get the payload
  $dataProduct = $_GET['product'];
  $dataSize = $_GET['size'];
  $dataAmount = $_GET['amount'];
  
  // Get the current cart
  $currentCart = [];
  $currentCart = $_SESSION['cart'];
  
  // Construct new cart item
  $currentCart[] = [$dataProduct, $dataSize, $dataAmount];
  
  // Set session
  $_SESSION['cart'] = $currentCart;
  
  // Response
  echo json_encode([true, $currentCart]);
?>