<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<body>

<main>

<?php

    $message="";

    /*------------------------------
    UPDATE FUNCTION
    ------------------------------*/

    if(isset($_POST['update'])) {
        $sqlUpdate = "UPDATE vehicules SET category = ?, title = ?, price = ?, years = ? , km = ?, pictures1 = ?, 
        pictures2 = ?, pictures3 = ?, textCourt = ?, description1 = ?, description2 = ?, characteristic = ? WHERE id = ?";
        $rs_update=$bdd->prepare($sqlUpdate);
       
        $category = $_POST['category'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $years = $_POST['years'];
        $km = $_POST['km'];
        $pictures1 = $_POST['pictures1'] ;
        $pictures2 = $_POST['pictures2'];
        $pictures3 = $_POST['pictures3'];
        $textCourt = $_POST['textCourt'];
        $description1 = $_POST['description1'];
        $description2 = $_POST['description2'];
        $characteristic = $_POST['characteristic'];
        $id = $_GET['id'];
        
        $rs_update->bindValue(1, $category, PDO::PARAM_STR);
        $rs_update->bindValue(2, $title, PDO::PARAM_STR);
        $rs_update->bindValue(3, $price, PDO::PARAM_STR);
        $rs_update->bindValue(4, $years, PDO::PARAM_INT);
        $rs_update->bindValue(5, $km, PDO::PARAM_INT);
        $rs_update->bindValue(6, $pictures1, PDO:: PARAM_STR);
        $rs_update->bindValue(7, $pictures2, PDO:: PARAM_STR);
        $rs_update->bindValue(8, $pictures3, PDO:: PARAM_STR);
        $rs_update->bindValue(9, $textCourt, PDO:: PARAM_STR);
        $rs_update->bindValue(10, $description1, PDO:: PARAM_STR);
        $rs_update->bindValue(11, $description2, PDO:: PARAM_STR);
        $rs_update->bindValue(12, $characteristic, PDO:: PARAM_STR);
        $rs_update->bindValue(13, $id, PDO::PARAM_INT);
        $rs_update->execute();

        $message = '<p class="error">Modification/Validation pris en compte</p>';
    
    }

    /*------------------------------
    DATA DISPLAY
    ------------------------------*/

    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM vehicules WHERE id = ?";
        $rs_select = $bdd->prepare($sql);
        $userID = $_GET['id'];
        $rs_select->bindValue(1, $userID, PDO::PARAM_INT);
        $rs_select->execute();
        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

        $category = $donnees['category'];
        $title = $donnees['title'];
        $price = $donnees['price'];
        $years = $donnees['years'];
        $km = $donnees['km'];
        $pictures1 = $donnees['pictures1'];
        $pictures2 = $donnees['pictures2'];
        $pictures3 = $donnees['pictures3'];
        $textCourt = $donnees['textCourt'];
        $description1 = $donnees['description1'];
        $description2 = $donnees['description2'];
        $characteristic = $donnees['characteristic'];

    } else {
        $category = "";
        $title = "";
        $price = "";
        $years = "";
        $km = "";
        $pictures1 = "";
        $pictures2 = "";
        $pictures3 = "";
        $textCourt = "";
        $description1 = "";
        $description2 = "";
        $characteristic = "";

    }

?>

    <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Modification d'un véhicule</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                            <div class="mb-3">
                                    <label for="category" class="form-label">Catégorie du véhicule :</label>
                                    <select class="form-select" id="category" name="category">
                                        <option>-- Veuillez sélectionner le service --</option>
                                        <option value="collection" <?php if ($category == 'collection') { echo 'selected'; } ?>>Collection</option>
                                        <option value="luxe" <?php if ($category == 'luxe') { echo 'selected'; } ?>>Luxe</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nom du véhicule :</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= $title; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prix :</label>
                                    <input type="text" name="price" class="form-control" id="price" value="<?= $price; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="km" class="form-label">Nombre de kilomètres :</label>
                                    <input type="text" name="km" class="form-control" id="km" value="<?= $km; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="years" class="form-label">Année de mise en circulation :</label>
                                    <input type="text" name="years" class="form-control" id="years" value="<?= $years; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 1 :</label>
                                    <input type="text" name="pictures1" class="form-control" id="pictures1" value="<?= $pictures1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures2" class="form-label">Lien de la photo 2 :</label>
                                    <input type="text" name="pictures2" class="form-control" id="pictures2" value="<?= $pictures2; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures3" class="form-label">Lien de la photo 3 :</label>
                                    <input type="text" name="pictures3" class="form-control" id="pictures3" value="<?= $pictures3; ?>"
                                </div>
                                <div class="mb-3">
                                    <label for="textCourt" class="form-label">Texte court pour vignette :</label>
                                    <textarea wrap="on" type="textarea" name="textCourt" class="form-control" id="textCourt"><?= $textCourt; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description1" class="form-label">Description 1ère partie (à coté de la photo) :</label>
                                    <textarea wrap="on" type="textarea" name="description1" class="form-control" id="description1"><?= $description1; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description2" class="form-label">Description 2ème partie (dessous la photo) :</label>
                                    <textarea wrap="on" type="textarea" name="description2" class="form-control" id="description2"><?= $description2; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="characteristic" class="form-label">Caractéristiques du véhicule :</label>
                                    <textarea wrap="on" type="textarea" name="characteristic" class="form-control" id="characteristic"><?= $characteristic; ?></textarea>
                                </div>
                                <div class="text-center">
                                    <button name="update" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Modifier le véhicule</button>
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