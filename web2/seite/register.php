<?php
  session_start();

  include('includes/db.php');

  include('template/pageHeader.php');
  include('template/header.php');
?>
    <main class="login">
      <div class="grid-wrapper">
        <div class="login-image"></div>
        <div class="login-sidebar">
          <h1>Registriern</h1>
          <p>Mit einer Registration kannst du Produkte in deinen Einkaufswagen legen und bei uns bestellen.</p>
          <form action="" method="post">
            <input type="email" name="email" placeholder="E-Mail" required />
            <input type="password" name="password" placeholder="Passwort" required />
            <input type="password" name="password2" placeholder="Passwort wiederholen" required />
            <?php
              if($_POST['submit']) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];

                if($password != $password2) {
                  // Passwords not equal
                  echo "<p>Passwörter stimmen nicht überein!</p>";
                } else {
                  // Check if email already exists
                  if(checkIfUserExists($email)) {
                    echo "<p>E-Mail wird bereits genutzt!</p>";
                  } else {
                    // Create User, loggs in and redirect if successful
                    if(createUser($email, $password)) {
                      header("Location: index.php");
                    }
                  }
                }
              }
            ?>
            <input type="submit" name="submit" value="Registriern" />
          </form>
        </div>
      </div>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
