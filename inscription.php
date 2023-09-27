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
      if (isset($_POST['button_inscription'])) {
        include "connexion_bdd.php";
        extract($_POST);
        if (isset($email) && isset($mdp1) && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != "") {
          if ($mdp1 != $mdp2)
            $error = "Les mots de passes sont différents !";
          else {
            $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email = '$email'");
            if (mysqli_num_rows($req) == 0) {
              $req = mysqli_query($con, "INSERT INTO utilisateurs VALUES (NULL, '$email', '$mdp1')");
              if ($req) {
                $_SESSION['message'] = "<p class='message'>Votre compte a été créer avec succès !</p>";
                header("location:index.php");
              } else
                $error = "Inscription echouée";
            } else {
              $error = "Cet email existe déjà !";
            }
          }
        } else {
          $error = "Veuillez remplir tous les champs !";
        }
      }
    ?>
    <form action="" method="POST" class="form_connexion_inscription">
      <h1>Inscription</h1>
      <p class="message_error">
        <?php
          if (isset($error))
            echo $error;
        ?>
      </p>
      <label>Adresse Mail</label>
      <input type="email" name="email" id="" />
      <label>Mot de passe</label>
      <input type="password" name="mdp1" class="mdp1" id="" />
      <label>Confirmation du Mot de passe</label>
      <input type="password" name="mdp2" class="mdp2" id="" />
      <input type="submit" value="Inscription" name="button_inscription" />
      <p class="link">
        Vous avez un compte ? <a href="index.html">Se connecter</a>
      </p>
    </form>

    <script src="script.js"></script>
  </body>
</html>
