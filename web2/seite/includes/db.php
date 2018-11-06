<?php
  mysqli_report(MYSQLI_REPORT_STRICT);

  try {
    $db = new mysqli("localhost", "wkbs", "wkbs", "tjaShop");
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

    return $newUserQuery;
  }

  function loginUser($email, $password) {
    global $db;

    if(!$email || !$password) { return false; }

    $checkUserQuery = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."' AND  `password` = '".md5($password)."';");

    if($checkUserQuery->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }
?>
