<footer>
  &copy; 2018 - tja!
</footer>

<script>
	<?php
		// Get ProductsList for Cart
		include('inc/productsList.php');
		echo "var productsList = ".json_encode($products);
	?>

	function refreshCart( cart ) {
		// Set Cart Number
		var elCartNumber = document.querySelector(".cartNumber");
		elCartNumber.innerHTML = Object.keys(cart).length;
		
		// Set Cart
		var elCart = document.querySelector(".cart");
		elCart.innerHTML = "";
		
		// Append one Item for one Cart Item
		for(var key in cart) {
			var cartItem = cart[key];
			var productItem = productsList[cartItem[0]];
			
			var newCartItem = document.createElement("div");
			newCartItem.classList.add("cartItem");
			newCartItem.innerHTML = "<b>" + productItem.title + "</b><br />[" + cartItem[1] + "] " + productItem.price + "€ x " + cartItem[2] + " = " + (Math.round((productItem.price * cartItem[2]) * 100) / 100) + "€<br /><button onClick='removeFromCart(\"" + key + "\");'>&times;</button>";
			
			elCart.appendChild(newCartItem);
		}
	}
	
	// Removes one Item from the Cart
	function removeFromCart(cartIndex) {
		fetch('inc/api.removeFromCart.php?cid=' + cartIndex)
		  .then(function(response) {
			  return response.json();
		  }).then(function(data) {
			if(data[0] == true) {
				refreshCart(data[1]);
			}
		  });
	}
	
	// Removes all Items from the Cart
	function clearCart() {
		fetch('inc/api.clearCart.php')
		  .then(function(response) {
			  return response.json();
		  }).then(function(data) {
			if(data[0] == true) {
				refreshCart(data[1]);
			}
		  });
	}
	
	// Initial Cart Refresh
	fetch('inc/api.getCart.php')
	  .then(function(response) {
		  return response.json();
	  }).then(function(data) {
		if(data[0] == true) {
			refreshCart(data[1]);
		}
	  });
</script>
