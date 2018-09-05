<!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>
      <?php
        include('template/header.php');
      ?>
      
      <h1>Product</h1>
      
      <?php
        $product = $_GET['product'];
      
        switch($product) {
          case 1:
            $productTitle = "Ruhrgebiet";
            $productDesc = "Wir sind das Ruhrgebiet!";
            break;
          case 2:
            $productTitle = "Gelsenkirchen";
            $productDesc = "Da is Schalke04 Land und so..";
            break;
        }
      ?>
      
      <h3><?=$productTitle;?></h3>
      <p><?=$productDesc;?></p>
      
      <form action="checkout.php" method="POST">
        <input type="hidden" name="product" value="<?=$product;?>" />
        <select name="size">
          <option value="xs">XS</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select><br />
        <input type="number" name="amount" value="1" /><br />
        <input type="submit" value="Bestellen" />
      </form>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
