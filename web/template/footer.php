<footer>
  &copy; 2018 - tja!
</footer>

<script>
	function refreshCart( cart ) {
		var cartNumber = document.querySelector(".cartNumber");
		var cart = document.querySelector(".cart");
		
		console.log(cart);
		
		cartNumber.innerHTML = cart.length;
	}
</script>
