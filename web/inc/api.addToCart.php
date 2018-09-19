<?php
  // No errors in api
  error_reporting(E_ALL ^  E_NOTICE); 
  
  // Start using sessions
  session_start();

  // Get the payload
  $dataProduct = $_GET['product'];
  $dataSize = $_GET['size'];
  $dataAmount = $_GET['amount'];
  
  // constructs an empty object and then sets the current cart. If the cart is not set, it will return an empty object
  // using objects because an array would automatically turn into an object if you would delete the first (index 0) item
  $currentCart = new stdClass();
  $currentCart = $_SESSION['cart'];
  
  // new cart item index/key
  // using a uniqid as index/key so there are no duplicates
  $dataCartID = uniqid();
  
  // Construct new cart item
  $currentCart->$dataCartID = [$dataProduct, $dataSize, $dataAmount];
  
  // Set session
  $_SESSION['cart'] = $currentCart;
  
  // Response
  echo json_encode([true, $currentCart, $dataCartID]);
?>