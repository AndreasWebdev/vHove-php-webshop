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
    // GET PRODUCT DATA

    // SHOW PRODUCT PAGE
    ?>
    <main></main>
    <?php
  }

  include('template/footer.php');
  include('template/pageFooter.php');
?>
