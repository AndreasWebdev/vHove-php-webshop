<?php
  mysqli_report(MYSQLI_REPORT_STRICT);

  try {
    $db = new mysqli("localhost", "root", "", "tja-shop");
  } catch(Exception $e) {
    echo "Datenbankverbindung konnte nicht hergestellt werden!";
    var_dump($e->getMessage());
    exit();
  }

  function checkIfUserExists($email) {
    global $db;

    $checkUserQuery = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."';");

    if($checkUserQuery->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }

  function createUser($email, $password) {
    global $db;

    if(!$email || !$password) { return false; }

    $newUserQuery = $db->query("INSERT INTO `users` (`email`, `password`, `created_time`) VALUES ('".$email."', '".md5($password)."', ".time().");");

    if($db->insert_id) {
      $_SESSION['tja-login'] = $db->insert_id;
      return true;
    } else {
      return false;
    }
  }

  function loginUser($email, $password) {
    global $db;

    if(!$email || !$password) { return false; }

    $checkUserQuery = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."' AND  `password` = '".md5($password)."';");

    if($checkUserQuery->num_rows > 0) {
      $checkUserQueryResult = $checkUserQuery->fetch_array(MYSQLI_ASSOC);
      $_SESSION['tja-login'] = $checkUserQueryResult["id"];
      return true;
    } else {
      return false;
    }
  }

  function getProduct($productID) {
    global $db;

    $productQuery = $db->query("SELECT * FROM `products` WHERE `id` = ".$productID.";");

    if($productQuery->num_rows > 0) {
      return $productQuery->fetch_array(MYSQLI_ASSOC);
    } else {
      return false;
    }
  }

  function addToCart($productID, $userID, $productVariant, $productQuantity) {
    global $db;

    if(!$productID || !$userID || !$productVariant || !$productQuantity) { return false; }

    $addToCartQuery = $db->query("INSERT INTO `cart_items` (`user_id`, `quantity`, `product_id`, `variant`, `added_time`) VALUES ('".$userID."', '".$productQuantity."', '".$productID."', '".$productVariant."', ".time().");");
    return $addToCartQuery;
  }

  function getCart($userID) {
    global $db;

    $cartQuery = $db->query("SELECT * FROM `cart_items` WHERE `user_id` = ".$userID." AND `order_id` = '';");

    if($cartQuery->num_rows > 0) {
      return $cartQuery->fetch_all(MYSQLI_ASSOC);
    } else {
      return false;
    }
  }

  function removeFromCart($cartID) {
    global $db;

    if(!$cartID) { return false; }

    $removeFromCartQuery = $db->query("DELETE FROM `cart_items` WHERE `id` = ".$cartID.";");
    return $removeFromCartQuery;
  }

  function createOrder($userID, $forname, $name, $adress, $zip, $city) {
    global $db;

    $cart = getCart($userID);

    if(!$userID || !$forname || !$name || !$adress || !$zip || !$city || !$cart) { return false; }

    $createOrderQuery = $db->query("INSERT INTO `user_orders` (`user_id`, `name`, `forname`, `adress`, `zip`, `city`, `order_time`) VALUES ('".$userID."', '".$name."', '".$forname."', '".$adress."', '".$zip."', '".$city."', ".time().");");

    $orderID = $db->insert_id;

    foreach ($cart as $cartItem) {
      $updateCartItem = $db->query("UPDATE `cart_items` SET `order_id` = '".$orderID."' WHERE `id` = ".$cartItem['id'].";");
    }

    return $createOrderQuery;
  }
?>
