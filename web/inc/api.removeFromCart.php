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
  
  // Construct the item to remove
  $cartItemToRemove = [$dataProduct, $dataSize, $dataAmount];
  
  // Remove item from cart array
  if (($key = array_search($cartItemToRemove, $currentCart)) !== false) {
	unset($currentCart[$key]);
  }
  
  // Set session
  $_SESSION['cart'] = $currentCart;
  
  // Response
  echo json_encode([true, $currentCart]);
?>