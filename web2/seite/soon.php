<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');
?>
    <main class="feed">
      <article>
        <div class="grid-wrapper">
          <h1>Tass'n und so'n Zeuch</h1>
          <div class="preview-image"><a href="soon.php"><img src="assets/img/feed-merch-soon.jpg" /></a></div>
          <div class="feed-sidebar">
            <h1>Kamming Suhn!</h1>
            <p>Bald gibts hier neuen Krämpel! Freut euch drauf.</p>
            <p>Alles hier im Schopp is 100% handgemacht und kommt direkt aus'm Pott, also nix mit billich Schina-Schrott.</p>
            <img src="assets/img/handmade.svg" alt="100% Handmade" />
          </div>
        </div>
      </article>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
