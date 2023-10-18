<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8">
        <title>Envoi d'un message par formulaire</title>
  </head>

  <body>
  
    <?php
      // Sécurisation du formulaire avec HTML Purifier
      require('../../htmlPurifier/library/HTMLPurifier.auto.php');
      
      $purificateur = new HTMLPurifier();
    
      // Vérification du remplissage des champs
      if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['subject']) && isset($_POST['message'])) {

      // Sécurisation du formulaire avec HTML Purifier
      $name = htmlspecialchars($_POST['name']);
      $name = $purificateur->purify($name);

      $email = htmlspecialchars($_POST['mail']);
      $email = $purificateur->purify($email);

      $subject = htmlspecialchars($_POST['subject']);
      $subject = $purificateur->purify($subject);

      $message = htmlspecialchars($_POST['message']);
      $message = $purificateur->purify($message);

      $title = $_POST['title'];
      $title = $purificateur->purify($title);
      
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Échappement des caractères spéciaux pour l'affichage dans le mail
        $name = preg_replace('/[^A-Za-z0-9\-éèà ]/', '', $name);
        $subject = preg_replace('/[^A-Za-z0-9\-éèà ]/', '', $subject);

        $return = false;

          if (isset($title)) {
            $return = mail('varesanocedric@gmail.com', 'Envoi depuis la page '.$title, 
            'Nom : '.$name.', '.'Adresse mail : '.$email.', '.'Sujet : '.$subject.', '.'Message : '.$message);
          } else {
            $return = mail('varesanocedric@gmail.com', 'Envoi depuis la page Contact', 
            'Nom : '.$name.', '.'Adresse mail : '.$email.', '.'Sujet : '.$subject.', '.'Message : '.$message);
          }

          if ($return) {
            echo '<h4>Votre message a bien été envoyé.</h4>
            <h4>Veuillez patienter un instant !</h4>
            <h4>Redirection en cours...</h4>
            
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