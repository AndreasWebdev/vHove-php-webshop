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
        var_dump($_SESSION['checkout']);
      ?>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
