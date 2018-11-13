<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');
?>
    <main class="feed">
      <article>
        <div class="grid-wrapper">
          <h1>Plürren</h1>
          <div class="preview-image"><a href="shirts.php"><img src="assets/img/feed-merch-shirts.jpg" /></a></div>
          <div class="feed-sidebar">
            <h1>Neue Shörts!</h1>
            <p>Wir ham für euch 'n paar neue Shörts zur Auswahl - echte Hingucker! Also einfach ma durchschaun.</p>
            <p>Sind übrigens zu 100% handgemacht, von den Illus bis zum Druck - direkt aus'm Pott für'n Pott! Nicht lang fackeln!</p>
            <a href="shirts.php"><button>Zu den Shörts!</button></a>
            <img src="assets/img/handmade.svg" alt="100% Handmade" />
          </div>
        </div>
      </article>
      <article>
        <div class="grid-wrapper">
          <h1>Tassen und so'n Krämpl</h1>
          <div class="preview-image"><a href="soon.php"><img src="assets/img/feed-merch-soon.jpg" /></a></div>
          <div class="feed-sidebar">
            <h1>Kamming suhn!</h1>
            <p>Bald gibt hier noch mehr Krämpl - von Tassn für Plörre bis Deko-Kacke und allet für'n Appel und 'n Ei!</p>
            <img src="assets/img/handmade.svg" alt="100% Handmade" />
          </div>
        </div>
      </article>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
