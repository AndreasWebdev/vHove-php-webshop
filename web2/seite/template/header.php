<header>
  <div class="grid-wrapper">
    <a href="index.php"><img src="assets/img/logo.svg" class="logo" alt="tja. macher halt!" /></a>
    <nav>
      <a href="index.php">Start</a>
      <a href="shirts.php">Shörts</a>
      <a href="soon.php">Anderen Krämpl</a>
    </nav>
    <div class="customer-region">
      <?php
        if($_SESSION['tja-login']) {
          ?>
            <a href="checkout.php"><i class="mdi mdi-cart-outline"></i> <span>Dein Karren</span></a>
            <a href="logout.php"><i class="mdi mdi-account-circle-outline"></i> <span>Logout</span></a>
          <?php
        } else {
          ?>
            <a href="login.php"><i class="mdi mdi-login-variant"></i> <span>Einloggen</span></a>
            <a href="register.php"><i class="mdi mdi-account-plus-outline"></i> <span>Registrieren</span></a>
          <?php
        }
      ?>
    </div>
  </div>
</header>
<div class="headerSpace"></div>
