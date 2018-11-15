<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');
?>
    <main class="impressum">
      <div class="grid-wrapper">
        <h1>Impressum</h1>
        <p>
          tja.shop<br />
          Andreas Heimann<br />
          Julian Schulte<br />
          Thiemo Frömberg<br />
          <br />
          Grimmstr. 44<br />
          45881 Gelsenkirchen<br />
          <br />
          Telefon: +49 (0)123 45 67 89<br />
          Email: info@muster-online-shop.de<br />
          Webseite: www.muster-online-shop.de<br />
          <br />

          Finanzamt Musterstadt<br />
          USt-ID-Nr.: DE00000000
        </p>
      </div>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
