<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8">
        <title>Envoi d'un message par formulaire</title>
  </head>

  <body>
  
    <?php

      if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['message'])) {
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['mail']);
      $subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);
      $title = $_POST['title'];

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Échappement des caractères spéciaux pour l'affichage dans le mail
        $name = preg_replace('/[^A-Za-z0-9\-éèà]/', '', $name);
        $subject = preg_replace('/[^A-Za-z0-9\-éèà]/', '', $subject);

          if (isset($title)) {
            $return = mail('varesanocedric@gmail.com', 'Envoi depuis la page '.$title, 
            'Nom : '.$name.', '.'Adresse mail : '.$email.', '.'Sujet : '.$subject.', '.'Message : '.$message);
          } else {
            $return = mail('varesanocedric@gmail.com', 'Envoi depuis la page Contact', 
            'Nom : '.$name.', '.'Adresse mail : '.$email.', '.'Sujet : '.$subject.', '.'Message : '.$message);
          }

          if ($return) {
            echo '<h4>Votre message a bien été envoyé.</h4>
            <script>
            function redirectToPreviousPage() {
                history.back();
            }
            setTimeout(redirectToPreviousPage, 5000);
            </script>';
          } else {
            echo '<h4 style="color: red">Erreur lors de l\'envoi du message.</h4>';
          }
      }
    }

    ?>
  </body>
</html>