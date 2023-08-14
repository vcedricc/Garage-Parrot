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
        $sqlUpdate = "UPDATE office SET phone = ?, address = ?, mail = ?, days1 = ?, days2 = ?, hours1 = ?, hours2 = ?";
        $rs_update=$bdd->prepare($sqlUpdate);
       
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $mail = $_POST['mail'];
        $days1 = $_POST['days1'];
        $days2 = $_POST['days2'];
        $hours1 = $_POST['hours1'];
        $hours2 = $_POST['hours2'];
        
        $rs_update->bindValue(1, $phone, PDO::PARAM_STR);
        $rs_update->bindValue(2, $address, PDO::PARAM_STR);
        $rs_update->bindValue(3, $mail, PDO::PARAM_STR);
        $rs_update->bindValue(4, $days1, PDO::PARAM_STR);
        $rs_update->bindValue(5, $days2, PDO::PARAM_STR);
        $rs_update->bindValue(6, $hours1, PDO::PARAM_STR);
        $rs_update->bindValue(7, $hours2, PDO::PARAM_STR);
        $rs_update->execute();

        $message = '<p class="error">Modification pris en compte</p>';
    }


    /*------------------------------
    DATA DISPLAY
    ------------------------------*/

        $sql = "SELECT * FROM office";
        $rs_select = $bdd->prepare($sql);
        $rs_select->execute();
        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

        $phone = $donnees['phone'];
        $address = $donnees['address'];
        $mail=$donnees['mail'];
        $days1=$donnees['days1'];
        $days2=$donnees['days2'];
        $hours1=$donnees['hours1'];
        $hours2=$donnees['hours2'];

?>

<body>

<main>

<div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Modification des informations</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Téléphone :</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?= $phone; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="mail" class="form-label">E-mail :</label>
                                    <input type="mail" name="mail" class="form-control" id="mail" value="<?= $mail; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adresse de l'établissement :</label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?= $address; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="days1" class="form-label">Jours d'ouverture 1 :</label>
                                    <input type="text" name="days1" class="form-control" id="days1" value="<?= $days1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="hours1" class="form-label">Heures d'ouverture 1 :</label>
                                    <input type="text" name="hours1" class="form-control" id="hours1" value="<?= $hours1; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="days2" class="form-label">Jours d'ouverture 2 :</label>
                                    <input type="text" name="days2" class="form-control" id="days2" value="<?= $days2; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="hours2" class="form-label">Heures d'ouverture 2 :</label>
                                    <input type="text" name="hours2" class="form-control" id="hours2" value="<?= $hours2; ?>">
                                </div>
                                <div class="text-center">
                                    <form action="./updateSociety.php">
                                        <button name="update" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Modifier</button>
                                    </form>
                                </div>
                            </form>
                            <a class="mt-4" href="./landing.php#societyAnchor">< Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

</body>
</html>