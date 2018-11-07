<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');

  if(!isset($_GET['id'])) {
?>
    <main class="shirts">
      <article>
        <div class="grid-wrapper">
          <h1>Für Typps</h1>
          <div class="renders">
            <div class="render">
              <a href="shirts.php?id=1">
                <div class="shirt-preview">
                  <img src="assets/product_images/m_s1.png" />
                </div>
              </a>
              <h2>Ruhrpott</h2>
            </div>
            <div class="render">
              <a href="shirts.php?id=2">
                <div class="shirt-preview">
                  <img src="assets/product_images/m_s2.png" />
                </div>
              </a>
              <h2>Gels'nkirchen</h2>
            </div>
          </div>
        </div>
      </article>
      <article>
        <div class="grid-wrapper">
          <h1>Für Ischen</h1>
          <div class="renders">
            <div class="render">
              <a href="shirts.php?id=3">
                <div class="shirt-preview">
                  <img src="assets/product_images/f_s1.png" />
                </div>
              </a>
              <h2>Ruhrpott</h2>
            </div>
            <div class="render">
              <a href="shirts.php?id=4">
                <div class="shirt-preview">
                  <img src="assets/product_images/f_s2.png" />
                </div>
              </a>
              <h2>Gels'nkirchen</h2>
            </div>
          </div>
        </div>
      </article>
    </main>

<?php
  } else {
    // IF PUT IN CART
    if($_POST['submit']) {
      if(addToCart($_GET['id'], $_SESSION['tja-login'], $_POST['variant'], $_POST['quantity'])) {
        header("Location: checkout.php");
      }
    }

    // GET PRODUCT DATA
    $productData = getProduct($_GET['id']);

    // SHOW PRODUCT PAGE
    ?>
    <main class="product">
      <div class="grid-wrapper">
        <div class="preview">
          <img src="assets/product_images/<?=$productData['cover_image'];?>" />
        </div>
        <aside>
          <h1><?=$productData['name'];?></h1>
          <p><?=$productData['description'];?></p>
          <div class="price">
            <span><?=$productData['price'];?> <i class="mdi mdi-currency-eur"></i></span>
            Inkl. 19% MwSt., zzgl. Versandkost'n
          </div>
          <?php
            if(!$_SESSION['tja-login']) {
              echo '<p class="not-logged-in">Ers\' einlocken.</p>';
            } else {
              ?>
                <form action="" method="post">
                  <select name="variant" required>
                    <option value="" disabled selected>Größe</option>
                    <option value="size-xs">XS</option>
                    <option value="size-s">S</option>
                    <option value="size-m">M</option>
                    <option value="size-l">L</option>
                    <option value="size-xl">XL</option>
                    <option value="size-xxl">XXL</option>
                  </select>
                  <input type="number" name="quantity" placeholder="Wie viele willse?" />
                  <input type="submit" name="submit" value="Innen Beut'l" />
                </form>
              <?php
            }
          ?>
        </aside>
      </div>
    </main>
    <?php
  }

  include('template/footer.php');
  include('template/pageFooter.php');
?>
