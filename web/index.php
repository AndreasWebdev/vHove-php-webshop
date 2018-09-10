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
      
      <h1>Index</h1>
      
      <a href="product.php?product=1">Ruhrgebiet</a>
      <a href="product.php?product=2">Gelsenkirchen</a>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
