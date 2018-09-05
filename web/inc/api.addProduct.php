<?php
  $product = $_POST['product'];
  $size = $_POST['size'];
  $amount = $_POST['amount'];
  
  $currentCheckout = $_SESSION['checkout'];
  array_push($currentCheckout, array("product" => $product, "size" => $size, "amount" => $amount));
  return "true";
?>
