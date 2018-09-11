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
  $currentCart = new stdClass();
  $currentCart = $_SESSION['cart'];
  
  // new cart item index
  $dataCartID = uniqid();
  
  // Construct new cart item
  $currentCart->$dataCartID = [$dataProduct, $dataSize, $dataAmount];
  
  // Set session
  $_SESSION['cart'] = $currentCart;
  
  // Response
  echo json_encode([true, $currentCart, $dataCartID]);
?>