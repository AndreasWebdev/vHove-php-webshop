<?php
session_start();
?>
<!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>
      <?php
        include('template/header.php');
      ?>
      
      <h1>Checkout</h1>
      
      <?php
        var_dump($_COOKIE['checkout']);
      ?>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
