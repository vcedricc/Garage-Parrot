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
        if (empty($_POST['category']) || empty($_POST['title']) || empty($_POST['price']) || empty($_POST['years']) || empty($_POST['km'])
        || empty($_POST['pictures1']) || empty($_POST['pictures2']) || empty($_POST['textCourt']) || empty($_POST['description1'])
        || empty($_POST['description2']) || empty($_POST['characteristic'])) {
            $message = '<p class="error">Veuillez remplir tous les champs !</p>';
        } else {
            $category = htmlspecialchars($_POST['category']);
            $title = htmlspecialchars($_POST['title']);
            $price = htmlspecialchars($_POST['price']);
            $years = htmlspecialchars($_POST['years']);
            $km = htmlspecialchars($_POST['km']);
            $pictures1 = htmlspecialchars($_POST['pictures1']);
            $pictures2 = htmlspecialchars($_POST['pictures2']);
            $pictures3 = htmlspecialchars($_POST['pictures3']);
            $textCourt = htmlspecialchars($_POST['textCourt']);
            $description1 = htmlspecialchars($_POST['description1']);
            $description2 = htmlspecialchars($_POST['description2']);
            $characteristic = htmlspecialchars($_POST['characteristic']);
            
            $sql="INSERT INTO `vehicules`(`category`, `title`, `price`,`years`, `km`, `pictures1`,
            `pictures2`, `pictures3`, `textCourt`, `description1`, `description2`, `characteristic`) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $rs_insert=$bdd->prepare($sql);

            $category = $_POST['category'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $years = $_POST['years'];
            $km = $_POST['km'];
            $pictures1 = $_POST['pictures1'];
            $pictures2 = $_POST['pictures2'];
            $pictures3 = $_POST['pictures3'];
            $textCourt = $_POST['textCourt'];
            $description1 = $_POST['description1'];
            $description2 = $_POST['description2'];
            $characteristic = $_POST['characteristic'];
        
            if ($rs_insert->execute([$category, $title, $price, $years, $km, $pictures1, $pictures2, $pictures3,
            $textCourt, $description1, $description2, $characteristic])) {
                $message = '<p class="error">Création faites avec succès !</p>';
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
                            <h3 class="text-center">Ajout d'un véhicule</h3>
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
                                        <option value="collection">Collection</option>
                                        <option value="luxe">Luxe</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nom du véhicule :</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Ford A cabriolet">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prix :</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="70000.00">
                                </div>
                                <div class="mb-3">
                                    <label for="km" class="form-label">Nombre de kilomètres :</label>
                                    <input type="text" name="km" class="form-control" id="km" placeholder="50000">
                                </div>
                                <div class="mb-3">
                                    <label for="years" class="form-label">Année de mise en circulation :</label>
                                    <input type="text" name="years" class="form-control" id="years" placeholder="1936">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures1" class="form-label">Lien de la photo 1 :</label>
                                    <input type="text" name="pictures1" class="form-control" id="pictures1" placeholder="./image/services/UnsplashCar1.jpg">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures2" class="form-label">Lien de la photo 2 :</label>
                                    <input type="text" name="pictures2" class="form-control" id="pictures2" placeholder="./image/services/UnsplashCar2.jpg">
                                </div>
                                <div class="mb-3">
                                    <label for="pictures3" class="form-label">Lien de la photo 3 :</label>
                                    <input type="text" name="pictures3" class="form-control" id="pictures3" placeholder="./image/services/UnsplashCar3.jpg">
                                </div>
                                <div class="mb-3">
                                    <label for="textCourt" class="form-label">Texte court pour vignette :</label>
                                    <textarea wrap="on" type="textarea" name="textCourt" class="form-control" id="textCourt" placeholder="Description du service"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description1" class="form-label">Description 1ère partie (à coté de la photo) :</label>
                                    <textarea wrap="on" type="textarea" name="description1" class="form-control" id="description1" placeholder="Description 2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description2" class="form-label">Description 2ème partie (dessous la photo) :</label>
                                    <textarea wrap="on" type="textarea" name="description2" class="form-control" id="description2" placeholder="Description 2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="characteristic" class="form-label">Caractéristiques du véhicule :</label>
                                    <textarea wrap="on" type="textarea" name="characteristic" class="form-control" id="characteristic" placeholder="Caractéristiques"></textarea>
                                </div>
                                <div class="text-center">
                                    <button name="create" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Ajouter le véhicule</button>
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