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
        $sqlUpdate = "UPDATE prestations SET title1 = ?, title2 = ?, pictures1 = ?, pictures2 = ? , textCourt = ?, 
        underTitle1 = ?, text1 = ?, underTitle2 = ?, text2 = ?, text3 = ?, price = ?, duration = ? WHERE id = ?";
        $rs_update=$bdd->prepare($sqlUpdate);
       
        $title1 = $_POST['title1'];
        $title2 = $_POST['title2'];
        $pictures1 = $_POST['pictures1'];
        $pictures2 = $_POST['pictures2'];
        $textCourt = $_POST['textCourt'];
        $underTitle1 = $_POST['underTitle1'] ;
        $text1 = $_POST['text1'];
        $underTitle2 = $_POST['underTitle2'];
        $text2 = $_POST['text2'];
        $text3 = $_POST['text3'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        $id = $_GET['id'];
        
        $rs_update->bindValue(1, $title1, PDO::PARAM_STR);
        $rs_update->bindValue(2, $title2, PDO::PARAM_STR);
        $rs_update->bindValue(3, $pictures1, PDO::PARAM_STR);
        $rs_update->bindValue(4, $pictures2, PDO::PARAM_STR);
        $rs_update->bindValue(5, $textCourt, PDO::PARAM_STR);
        $rs_update->bindValue(6, $underTitle1, PDO:: PARAM_STR);
        $rs_update->bindValue(7, $text1, PDO:: PARAM_STR);
        $rs_update->bindValue(8, $underTitle2, PDO:: PARAM_STR);
        $rs_update->bindValue(9, $text2, PDO:: PARAM_STR);
        $rs_update->bindValue(10, $text3, PDO:: PARAM_STR);
        $rs_update->bindValue(11, $price, PDO:: PARAM_STR);
        $rs_update->bindValue(12, $duration, PDO:: PARAM_STR);
        $rs_update->bindValue(13, $id, PDO::PARAM_INT);
        $rs_update->execute();

        $message = '<p class="error">Modification/Validation pris en compte</p>';
    
    }

    /*------------------------------
    DATA DISPLAY
    ------------------------------*/

    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM prestations WHERE id = ?";
        $rs_select = $bdd->prepare($sql);
        $userID = $_GET['id'];
        $rs_select->bindValue(1, $userID, PDO::PARAM_INT);
        $rs_select->execute();
        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

        $title1 = $donnees['title1'];
        $title2 = $donnees['title2'];
        $pictures1 = $donnees['pictures1'];
        $pictures2 = $donnees['pictures2'];
        $textCourt = $donnees['textCourt'];
        $underTitle1 = $donnees['underTitle1'];
        $text1 = $donnees['text1'];
        $underTitle2 = $donnees['underTitle2'];
        $text2 = $donnees['text2'];
        $text3 = $donnees['text3'];
        $price = $donnees['price'];
        $duration = $donnees['duration'];

    } else {
        $title1 = "";
        $title2 = "";
        $pictures1 = "";
        $pictures2 = "";
        $textCourt = "";
        $underTitle1 = "";
        $text1 = "";
        $underTitle2 = "";
        $text2 = "";
        $text3 = "";
        $price = "";
        $duration = "";
    }
?>

<body>

<main>

<div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Modifier une prestation</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                        <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="title1" class="form-label">Titre court pour la vignette :</label>
                                    <input type="text" name="title1" class="form-control" id="title1" value="<?= $title1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="title2" class="form-label">Titre long pour la page :</label>
                                    <input type="text" name="title2" class="form-control" id="title2" value="<?= $title2; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 1 :</label>
                                    <input type="text" name="pictures1" class="form-control" id="pictures1" value="<?= $pictures1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 2 :</label>
                                    <input type="text" name="pictures2" class="form-control" id="pictures2" value="<?= $pictures2; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="textCourt" class="form-label">Texte court pour vignette :</label>
                                    <textarea wrap="on" type="textarea" name="textCourt" class="form-control" id="textCourt"><?= $textCourt; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="underTitle1" class="form-label">Sous-titre 1ère partie :</label>
                                    <input type="text" name="underTitle1" class="form-control" id="underTitle1" value="<?= $underTitle1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="text1" class="form-label">Texte 1ère sous partie :</label>
                                    <textarea wrap="on" type="textarea" name="text1" class="form-control" id="text1"><?= $text1; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="underTitle2" class="form-label">Sous-titre 2ème partie :</label>
                                    <input type="text" name="underTitle2" class="form-control" id="underTitle2" value="<?= $underTitle2; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="text2" class="form-label">Texte 2ème sous partie :</label>
                                    <textarea wrap="on" type="textarea" name="text2" class="form-control" id="text2"><?= $text2; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="text3" class="form-label">Description plus précise :</label>
                                    <textarea wrap="on" type="textarea" name="text3" class="form-control" id="text3"><?= $text3; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Tarifs de la prestation :</label>
                                    <input type="text" name="price" class="form-control" id="price" value="<?= $price; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Durée de la prestation (optionnel) :</label>
                                    <input type="text" name="duration" class="form-control" id="duration" value="<?= $duration; ?>">
                                </div>
                                <div class="text-center">
                                    <button name="update" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Modifier la prestation</button>
                                </div>
                            </form>
                            <a class="mt-4" href="./landing.php#prestationsAnchor">< Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

</body>
</html>