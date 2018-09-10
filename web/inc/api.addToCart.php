<?php
  // Get the payload
  $dataProduct = $_GET['product'];
  $dataSize = $_GET['size'];
  $dataAmount = $_GET['amount'];
  
  $currentCart = "null";
  
  // Response
  echo json_encode($currentCart."Hello World!".$dataProduct." + ".$dataSize." + ".$dataAmount." / ".time());
?>