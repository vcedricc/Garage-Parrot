<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<?PHP

    $message="";

    /*------------------------------
    UPDATE FUNCTION
    ------------------------------*/

    if(isset($_POST['update'])) {
        $sqlUpdate = "UPDATE notice SET name = ?, firstname = ?, text = ?, prestations = ? , notation = ?, statut = ? WHERE id = ?";
        $rs_update=$bdd->prepare($sqlUpdate);
       
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $text = $_POST['text'];
        $prestations = $_POST['prestations'];
        $notation = $_POST['notation'];
        $statut = $_POST['statut'] ;
        $id = $_GET['id'];
        
        $rs_update->bindValue(1, $name, PDO::PARAM_STR);
        $rs_update->bindValue(2, $firstname, PDO::PARAM_STR);
        $rs_update->bindValue(3, $text, PDO::PARAM_STR);
        $rs_update->bindValue(4, $prestations, PDO::PARAM_STR);
        $rs_update->bindValue(5, $notation, PDO::PARAM_INT);
        $rs_update->bindValue(6, $statut, PDO:: PARAM_INT);
        $rs_update->bindValue(7, $id, PDO::PARAM_INT);
        $rs_update->execute();

        $message = '<p class="error">Modification/Validation pris en compte</p>';
    
    }

    /*------------------------------
    DATA DISPLAY
    ------------------------------*/

    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM notice WHERE id = ?";
        $rs_select = $bdd->prepare($sql);
        $userID = $_GET['id'];
        $rs_select->bindValue(1, $userID, PDO::PARAM_INT);
        $rs_select->execute();
        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

        $name = $donnees['name'];
        $firstname = $donnees['firstname'];
        $text=$donnees['text'];
        $prestations=$donnees['prestations'];
        $notation=$donnees['notation'];
        $statut=$donnees['statut'];

    } else {
        $name = "";
        $firstname = "";
        $text = "";
        $prestations = "";
        $notation = "";
        $statut = "";
    }
?>

<body>

<main>

<div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Modifier/Valider un avis</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $_GET['id']; ?>">

                                    <label for="name" class="form-label">Nom du client :</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $name; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Prénom du client :</label>
                                    <input type="firstname" name="firstname" class="form-control" id="firstname" value="<?= $firstname; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Avis du client :</label>
                                    <textarea wrap="on" type="textarea" name="text" class="form-control" id="text"><?= $text; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="prestations" class="form-label">Quel service souhaitez-vous évaluer ?</label>
                                    <select class="form-select" id="prestations" name="prestations">
                                        <option value="M" <?php if ($prestations == 'M') { echo 'selected'; } ?>>Atelier mécanique</option>
                                        <option value="C" <?php if ($prestations == 'C') { echo 'selected'; } ?>>Atelier carrosserie</option>
                                        <option value="N" <?php if ($prestations == 'N') { echo 'selected'; } ?>>Nettoyage haut de gamme</option>
                                        <option value="V" <?php if ($prestations == 'V') { echo 'selected'; } ?>>Vente de véhicules</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="notation" class="form-label">Notation :</label>
                                    <select class="form-select" id="notation" name="notation">
                                        <option value="0" <?php if ($notation == 0) { echo 'selected'; } ?>>0 - pas du tout satisfait</option>
                                        <option value="1" <?php if ($notation == 1) { echo 'selected'; } ?>>1 - peu satisfait</option>
                                        <option value="2" <?php if ($notation == 2) { echo 'selected'; } ?>>2 - assez satisfait</option>
                                        <option value="3" <?php if ($notation == 3) { echo 'selected'; } ?>>3 - satisfait</option>
                                        <option value="4" <?php if ($notation == 4) { echo 'selected'; } ?>>4 - très satisfait</option>
                                        <option value="5" <?php if ($notation == 5) { echo 'selected'; } ?>>5 - excellence</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="statut" class="form-label">Souhaitez-vous que cette article soit publiable et visible aux utilisateurs du site :</label>
                                    <select class="form-select" id="statut" name="statut">
                                        <option value="1" <?php if ($statut == 1) { echo 'selected'; } ?>>Oui</option>
                                        <option value="2" <?php if ($statut == 2) { echo 'selected'; } ?>>Non</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button name="update" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Modifier/Valider l'avis</button>
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