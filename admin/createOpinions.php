<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<body>

<main>

<?php
    $message = "";

    if (isset($_POST['create'])) {
        if (empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['text']) || empty($_POST['prestations']) || empty($_POST['notation']))  {
            $message = '<p class="error">Veuillez remplir tous les champs !</p>';
        } else {
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $text = htmlspecialchars($_POST['text']);
            $prestations = htmlspecialchars(($_POST['prestations']));
            $notation = htmlspecialchars($_POST['notation']);
            
            $sql="INSERT INTO `notice`(`name`,`firstname`,`text`, `prestations`, `notation`, `statut`) VALUES(?,?,?,?,?,?)";
            
            $rs_insert=$bdd->prepare($sql);

            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $text = $_POST['text'];
            $prestations = $_POST['prestations'];
            $notation = $_POST['notation'];
            $statut = null;
         
            if ($rs_insert->execute([$name, $firstname, $text, $prestations ,$notation, $statut])) {
                $message = '<p class="error">Créer avec succès</p>';
                header('Location: ./landing.php');
            } else {
                $message = '<p class="error">Une erreur a eu lieu !</p>';
            }
        }
    }
  
?>

    <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Création d'un avis client</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom du client :</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="DUPONT">
                                </div>
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Prénom du client :</label>
                                    <input type="firstname" name="firstname" class="form-control" id="firstname" placeholder="Christophe">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Avis du client :</label>
                                    <textarea wrap="on" type="textarea" name="text" class="form-control" id="text" placeholder="Commentaire"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="prestations" class="form-label">Quel service souhaitez-vous évaluer ?</label>
                                    <select class="form-select" id="prestations" name="prestations">
                                        <option>-- Veuillez sélectionner le service --</option>
                                        <option value="M">Atelier mécanique</option>
                                        <option value="C">Atelier carrosserie</option>
                                        <option value="N">Nettoyage haut de gamme</option>
                                        <option value="V">Vente de véhicules</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="notation" class="form-label">Notation :</label>
                                    <select class="form-select" id="notation" name="notation">
                                        <option>-- Veuillez sélectionner --</option>
                                        <option value="0">0 - pas du tout satisfait</option>
                                        <option value="1">1 - peux satisfait</option>
                                        <option value="2">2 - assez satisfait</option>
                                        <option value="3">3 - satisfait</option>
                                        <option value="4">4 - très satisfait</option>
                                        <option value="5">5 - excellence</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button name="create" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Créer le compte</button>
                                </div>
                            </form>
                            <a class="mt-4" href="./landing.php">< Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

</body>
</html>