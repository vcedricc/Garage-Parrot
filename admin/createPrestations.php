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
        if (empty($_POST['title1']) || empty($_POST['title2']) || empty($_POST['pictures1']) || empty($_POST['pictures2']) || empty($_POST['textCourt'])
        || empty($_POST['underTitle1']) || empty($_POST['text1']) || empty($_POST['underTitle2']) || empty($_POST['text2'])
        || empty($_POST['text3']) || empty($_POST['price'])) {
            $message = '<p class="error">Veuillez remplir tous les champs !</p>';
        } else {
            $title1 = htmlspecialchars($_POST['title1']);
            $title2 = htmlspecialchars($_POST['title2']);
            $pictures1 = htmlspecialchars($_POST['pictures1']);
            $pictures2 = htmlspecialchars($_POST['pictures2']);
            $textCourt = htmlspecialchars($_POST['textCourt']);
            $underTitle1 = htmlspecialchars($_POST['underTitle1']);
            $text1 = htmlspecialchars($_POST['text1']);
            $underTitle2 = htmlspecialchars($_POST['underTitle2']);
            $text2 = htmlspecialchars($_POST['text2']);
            $text3 = htmlspecialchars($_POST['text3']);
            $price = htmlspecialchars($_POST['price']);
            $duration = htmlspecialchars($_POST['duration']);
            
            $sql="INSERT INTO `prestations`(`title1`, `title2`, `pictures1`,`pictures2`, `textCourt`, `underTitle1`,
            `text1`, `underTitle2`, `text2`, `text3`, `price`, `duration`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $rs_insert=$bdd->prepare($sql);

            $title=$_POST['title1'];
            $title=$_POST['title2'];
            $pictures1=$_POST['pictures1'];
            $pictures2=$_POST['pictures2'];
            $textCourt=$_POST['textCourt'];
            $underTitle1=$_POST['underTitle1'];
            $text1=$_POST['text1'];
            $underTitle2=$_POST['underTitle2'];
            $text2=$_POST['text2'];
            $text3=$_POST['text3'];
            $price=$_POST['price'];
            $duration=$_POST['duration'];
         
            if ($rs_insert->execute([$title1, $title2, $pictures1, $pictures2, $textCourt, $underTitle1,
            $text1, $underTitle2, $text2, $text3, $price, $duration])) {
                $message = '<p class="error">Création faites avec succès !</p>';
                header('Location: ./landing.php#prestationsAnchor');
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
                            <h3 class="text-center">Création d'une prestation</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="title1" class="form-label">Titre court pour la vignette :</label>
                                    <input type="text" name="title1" class="form-control" id="title1" placeholder="Atelier mécanique">
                                </div>
                                <div class="mb-3">
                                    <label for="title2" class="form-label">Titre long pour la page :</label>
                                    <input type="text" name="title2" class="form-control" id="title2" placeholder="Atelier de réparation et rénovation mécanique">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 1 :</label>
                                    <input type="text" name="pictures1" class="form-control" id="pictures1" placeholder="./image/services/UnsplashCar1.jpg">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 2 :</label>
                                    <input type="text" name="pictures2" class="form-control" id="pictures2" placeholder="./image/services/UnsplashCar2.jpg">
                                </div>
                                <div class="mb-3">
                                    <label for="textCourt" class="form-label">Texte court pour vignette :</label>
                                    <textarea wrap="on" type="textarea" name="textCourt" class="form-control" id="textCourt" placeholder="Description du service"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="underTitle1" class="form-label">Sous-titre 1ère partie :</label>
                                    <input type="text" name="underTitle1" class="form-control" id="underTitle1" placeholder="Sous-titre 1">
                                </div>
                                <div class="mb-3">
                                    <label for="text1" class="form-label">Texte 1ère sous partie :</label>
                                    <textarea wrap="on" type="textarea" name="text1" class="form-control" id="text1" placeholder="Description 1"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="underTitle2" class="form-label">Sous-titre 2ème partie :</label>
                                    <input type="text" name="underTitle2" class="form-control" id="underTitle2" placeholder="Sous-titre 2">
                                </div>
                                <div class="mb-3">
                                    <label for="text2" class="form-label">Texte 2ème sous partie :</label>
                                    <textarea wrap="on" type="textarea" name="text2" class="form-control" id="text2" placeholder="Description 2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="text3" class="form-label">Description plus précise :</label>
                                    <textarea wrap="on" type="textarea" name="text3" class="form-control" id="text3" placeholder="Description 3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Tarifs de la prestation :</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Prix ou mention (ex : sur devis)">
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Durée de la prestation (optionnel) :</label>
                                    <input type="text" name="duration" class="form-control" id="duration" placeholder="durée de la prestation (si nécessaire)">
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