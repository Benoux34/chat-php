<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="chat">
      <div class="button-email">
        <span>ben@gmail.com</span>
        <a href="" class="deconnexion_btn">Déconnexion</a>
      </div>
      <div class="message_box">
        <div class="message your_message">
          <span>Vous</span>
          <p>Comment ça vas ?</p>
          <p class="date">25/09/2023</p>
        </div>
        <div class="message others_message">
          <span>seb@gmail.com</span>
          <p>Salut !</p>
          <p class="date">25/09/2023</p>
        </div>
      </div>
      <form action="" class="send_message" method="POST">
        <textarea
          name="message"
          cols="30"
          rows="2"
          placeholder="votre message"
        ></textarea>
        <input type="submit" value="Envoyé" name="send" />
      </form>
    </div>
  </body>
</html>
