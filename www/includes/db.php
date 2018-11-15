<?php
  // if there are mysql errors, don't just ignore them but show them
  mysqli_report(MYSQLI_REPORT_STRICT);

  // Connect to database
  try {
    // server, username, password, database name
    $db = new mysqli("localhost", "root", "", "tja-shop");
  } catch(Exception $e) {
    // Show error if database connection failed
    echo "Datenbankverbindung konnte nicht hergestellt werden!";
    var_dump($e->getMessage());
    exit();
  }

  // Check if an email is already in use
  // example: checkIfUserExists("example@example.org")
  // parameters: (string) Email
  function checkIfUserExists($email) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // Check if email is in use
    $checkUserQuery = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."';");

    if($checkUserQuery->num_rows > 0) {
      // Return true if there is at least one entry
      return true;
    } else {
      return false;
    }
  }

  // Create a new user
  // example: createUser("example@example.org", "tollespasswort")
  // parameters: (string) Email, (string) Password
  function createUser($email, $password) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // return false if either email or password are empty or not set
    if(!$email || !$password) { return false; }

    // Insert new entry in database
    // using md5 for password encryption, could use sha1 or more secure php libraries
    // time() returns the current timestamp
    $newUserQuery = $db->query("INSERT INTO `users` (`email`, `password`, `created_time`) VALUES ('".$email."', '".md5($password)."', ".time().");");

    // Check if mysql reported back the ID of the newly inserted row
    if($db->insert_id) {
      // set the session value to the new user id to log the user in
      $_SESSION['tja-login'] = $db->insert_id;
      return true;
    } else {
      return false;
    }
  }

  // Login a user
  // example: loginUser("example@example.org", "tollespasswort")
  // parameters: (string) Email, (string) Password
  function loginUser($email, $password) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // return false if either email or password are empty or not set
    if(!$email || !$password) { return false; }

    // Check if there is an user with the exact email, encrypt the password and check if the encrypted password is the same
    $checkUserQuery = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."' AND  `password` = '".md5($password)."';");

    if($checkUserQuery->num_rows > 0) {
      // There is at least one user with that exact email and password. We can expect it to be one row
      // Get the user as an array
      $checkUserQueryResult = $checkUserQuery->fetch_array(MYSQLI_ASSOC);

      // set the session to the user id
      $_SESSION['tja-login'] = $checkUserQueryResult["id"];
      return true;
    } else {
      return false;
    }
  }

  // Get the row of a product
  // example: getProduct(5)
  // parameters: (integer) ProductID
  function getProduct($productID) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // Get any products with the ID of $productID
    $productQuery = $db->query("SELECT * FROM `products` WHERE `id` = ".$productID.";");

    if($productQuery->num_rows > 0) {
      // we can expect the result to be one product, returning it as an array
      return $productQuery->fetch_array(MYSQLI_ASSOC);
    } else {
      return false;
    }
  }

  // Put a product in a users cart
  // example: addToCart(5, 1, "size-xl", 3)
  // parameters: (integer) ProductID, (integer) UserID, (string) Variant, (integer) Quantity
  function addToCart($productID, $userID, $productVariant, $productQuantity) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // return false if any parameter is not set or empty
    if(!$productID || !$userID || !$productVariant || !$productQuantity) { return false; }

    // Insert new CartItem
    // time() returns the current timestamp
    $addToCartQuery = $db->query("INSERT INTO `cart_items` (`user_id`, `quantity`, `product_id`, `variant`, `added_time`) VALUES ('".$userID."', '".$productQuantity."', '".$productID."', '".$productVariant."', ".time().");");

    // Return the result of the insertation. Will be "true" if insertation was successfully
    return $addToCartQuery;
  }

  // Get all CartItems from a user
  // example: getCart(1)
  // parameters: (integer) UserID
  function getCart($userID) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // Get all CartItems from user with id $userID that are in no order (In keiner Bestellung)
    $cartQuery = $db->query("SELECT * FROM `cart_items` WHERE `user_id` = ".$userID." AND `order_id` = '';");

    // Check if there even are CartItems
    if($cartQuery->num_rows > 0) {
      // Return all Items as an array
      return $cartQuery->fetch_all(MYSQLI_ASSOC);
    } else {
      return false;
    }
  }

  // Remove an CartItem from a user
  // example: removeFromCart(5)
  // parameter: (integer) CartItem ID
  function removeFromCart($cartID) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // return false if cartID is not set or empty
    if(!$cartID) { return false; }

    // Removing the row in the cartitems table with the id $cartID
    $removeFromCartQuery = $db->query("DELETE FROM `cart_items` WHERE `id` = ".$cartID.";");

    // Returning the result of the deletion. Will be "true" if deletion was successfully
    return $removeFromCartQuery;
  }

  // Create a new order with all CartItems of a user that are in no oder yet
  // example: createOrder(1, "Max", "Mustermann", "Musterstraße 2", "12345", "Musterstadt")
  // parameters: (integer) UserID, (string) forname, (string) name, (string) adress, (string) zip, (string) city
  function createOrder($userID, $forname, $name, $adress, $zip, $city) {
    // defines $db as global as it was defined outside of this function
    global $db;

    // return false if any parameter is empty or not set
    if(!$userID || !$forname || !$name || !$adress || !$zip || !$city || !$cart) { return false; }

    // get all current cart items
    $cart = getCart($userID);

    // Insert new order
    // time() returns the current timestamp
    $createOrderQuery = $db->query("INSERT INTO `user_orders` (`user_id`, `name`, `forname`, `adress`, `zip`, `city`, `order_time`) VALUES ('".$userID."', '".$name."', '".$forname."', '".$adress."', '".$zip."', '".$city."', ".time().");");

    // get the id of the newly inserted order
    $orderID = $db->insert_id;

    // go through all CartItems of the user
    foreach ($cart as $cartItem) {
      // and put the order id in it.
      $updateCartItem = $db->query("UPDATE `cart_items` SET `order_id` = '".$orderID."' WHERE `id` = ".$cartItem['id'].";");
    }

    // Return the result of the insertation. Will be "true" if insertation was successfully
    return $createOrderQuery;
  }
?>
