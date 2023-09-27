<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Chat Application</title>
  </head>
  <body>
    <?php
      if (isset($_POST['button_con'])) {
        include "connexion_bdd.php";
        extract($_POST);
        if (isset($email) && isset($mdp1) && $email != "" && $mdp1 != "") {
          $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp1'");
          if (mysqli_num_rows($req) > 0) {
            $_SESSION['user'] = $email;
            header("location:chat.php");
            unset($_SESSION['message']);
          } else {
            $error = "Email ou Mot de passe incorrecte(s)";
          }
        } else {
          $error = "Veuillez remplir tous les champs !";
        }
      }
    ?>
    <form action="" method="POST" class="form_connexion_inscription">
      <h1>Connexion</h1>
      <?php
        if (isset($_SESSION['message']))
          echo $_SESSION['message'];
      ?>
      <p class="message_error">
        <?php
          if (isset($error))
            echo $error;
        ?>
      </p>
      <label>Adresse Mail</label>
      <input type="email" name="email" id="" />
      <label>Mot de passe</label>
      <input type="password" name="mdp1" id="" />
      <input type="submit" value="Connexion" name="button_con" />
      <p class="link">
        Vous n'avez pas de compte ?
        <a href="inscription.html">Créer un compte</a>
      </p>
    </form>
  </body>
</html>
