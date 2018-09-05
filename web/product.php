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
      
      <hr />
      
      <input type="hidden" class="dataProduct" value="<?=$product;?>" />
      <select class="dataSize">
        <option value="xs">XS</option>
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="xl">XL</option>
        <option value="xxl">XXL</option>
      </select><br />
      <input type="number" class="dataAmount" value="1" /><br />
      <button class="addToCheckout">Zum Warenkorb hinzufügen</button>
      
      <?php
        setcookie('checkout', array(1 => "Test", 2 => "Warenkorb 2");
        echo $_COOKIE['checkout'];
      ?>
      
      <script>
        var addToCheckoutButton = document.querySelector('.addToCheckout');
        
        addToCheckoutButton.addEventListener('click', function() {
          var dataProduct = document.querySelector('.dataProduct').value;
          var dataSize = document.querySelector('.dataSize').value;
          var dataAmount = document.querySelector('.dataAmount').value;
          
          console.log(dataProduct + " - " + dataSize + " - " + dataAmount);
        });
      </script>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
