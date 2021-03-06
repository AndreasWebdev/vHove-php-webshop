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
          <h1>Login</h1>
          <form action="" method="post">
            <input type="email" name="email" placeholder="E-Mail" required />
            <input type="password" name="password" placeholder="Passwort" required />
            <?php
              if($_POST['submit']) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if(!checkIfUserExists($email)) {
                  // There is no user with that email
                  echo "<p>Diese E-Mail existiert noch nicht!</p>";
                } else {
                  // Logs User In and sends him to index
                  if(loginUser($email, $password)) {
                    header("Location: index.php");
                  }
                }
              }
            ?>
            <input type="submit" name="submit" value="Login" />
          </form>
        </div>
      </div>
    </main>

<?php
  include('template/footer.php');
  include('template/pageFooter.php');
?>
