<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<body>

<main>

<?php
    $message = "";

    if (isset($_GET['id'])) {
        $sqlDelete = "DELETE FROM vehicules WHERE id = ?";

        $rs_supp = $bdd->prepare($sqlDelete);

        $userID = $_GET['id'];
        $rs_supp->bindValue(1, $userID, PDO::PARAM_INT);
        $rs_supp->execute();

        $message = '<p class="error">Le véhicule a été supprimé !</p>';
    }else {
        $message = '<p class="error">Une erreur est survenue</p>';
    }
  
?>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Suppression d'un véhicule</h3>
                    </div>

                    <?PHP
                        echo $message;
                    ?>

                    <div class="card-body">
                        <a class="mt-4" href="./landing.php">< Revenir à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

</body>
</html>