<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');
?>
    <main class="checkout">
      <div class="grid-wrapper">
        <?php
          if($_POST['submit']) {
            if(createOrder($_SESSION['tja-login'], $_POST['forname'], $_POST['name'], $_POST['adress'], $_POST['zip'], $_POST['city'])) {
              echo "<h1>Bestellung erfolgreich!</h1><p>Deine Bestellung ist bei uns eingegangen und wird nun verarbeitet!</p>";
            } else {
              echo "<h1>Bestellung konnte nicht aufgegeben werden!</h1><p>Da ist wohl etwas schief gelaufen! Versuche es später noch einmal!";
            }
          } else {
            $cart = getCart($_SESSION['tja-login']);
            $total = 0;

            if($_GET['remove']) {
              removeFromCart($_GET['remove']);
              header("Location: checkout.php");
            }

            if($cart == false) {
              echo "<h1>Dein Beut'l</h1><p>Dein Beut'l ist ja noch leer!<br />Komm wieder, wenn du Produkte hinzugefügt hast!</p>";
            } else {
              ?>
                <h1>Dein Beut'l</h1>
                <div class="cart">
              <?php
              foreach ($cart as $cartItem) {
                $product = getProduct($cartItem['product_id']);

                $total += $product['price'] * $cartItem['quantity'];

                ?>
                  <div class="item">
                    <div class="preview"><img src="assets/product_images/<?=$product['cover_image'];?>" /></div>
                    <div class="name"><?=$product['name'];?> (<?=$cartItem['variant'];?>)</div>
                    <div class="price"><?=$product['price'];?> <i class="mdi mdi-currency-eur"></i> &times; <?=$cartItem['quantity'];?></div>
                    <div class="actions"><a href="checkout.php?remove=<?=$cartItem['id'];?>"><button>Löschen</button></a></div>
                  </div>
                <?php
              }

              ?>
                </div>
                <div class="total">
                  <span><?=$total;?> <i class="mdi mdi-currency-eur"></i></span>
                  Inkl. 19% MwSt., zzgl. Versandkost'n
                </div>

                <h1>Bestelldetails</h1>
                <form action="" method="post">
                  <div class="item">
                    <label for="forname">Vorname</label>
                    <input type="text" name="forname" placeholder="Max" required />
                  </div>
                  <div class="item">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Mustermann" required />
                  </div>
                  <div class="item">
                    <label for="adress">Adresse</label>
                    <input type="text" name="adress" placeholder="Musterstraße 5" required />
                  </div>
                  <div class="item">
                    <label for="zip">Postleitzahl</label>
                    <input type="text" name="zip" placeholder="12345" required />
                  </div>
                  <div class="item">
                    <label for="city">Stadt</label>
                    <input type="text" name="city" placeholder="Musterstadt" required />
                  </div>
                  <div class="item">
                    <input type="submit" name="submit" value="Bestellen" />
                  </div>
                </form>
              <?php
            }
          }
        ?>
      </div>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
