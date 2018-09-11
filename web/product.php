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
      
      <h1>Product</h1>
      
      <?php
		include('inc/productsList.php');
		
        $pid = $_GET['product'];
		
		$productTitle = $products[$pid]['title'];
		$productDesc = $products[$pid]['desc'];
		$productImg = $products[$pid]['img'];
      ?>
      
      <h3><?=$productTitle;?></h3>
      <p><?=$productDesc;?></p>
      
      <hr />
      
      <input type="hidden" class="dataProduct" value="<?=$pid;?>" />
      <select class="dataSize">
        <option value="xs">XS</option>
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="xl">XL</option>
        <option value="xxl">XXL</option>
      </select><br />
      <input type="number" class="dataAmount" value="1" /><br />
      <button class="addToCheckout">Zum Warenkorb hinzufügen</button>
      
      <script>
        var addToCheckoutButton = document.querySelector('.addToCheckout');
        
        addToCheckoutButton.addEventListener('click', function() {
          var dataProduct = document.querySelector('.dataProduct').value;
          var dataSize = document.querySelector('.dataSize').value;
          var dataAmount = document.querySelector('.dataAmount').value;
		  
		  // send new cart items to server
		  fetch('inc/api.addToCart.php?product=' + dataProduct + '&size=' + dataSize + "&amount=" + dataAmount)
		  .then(function(response) {
			  return response.json();
		  }).then(function(data) {
			if(data[0] == true) {
				refreshCart(data[1]);
			}
		  });
        });
      </script>
      
      <?php
        include('template/footer.php');
      ?>
    </body>
  </html>
