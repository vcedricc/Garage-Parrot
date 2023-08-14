<?php 
    require_once "templates/php/head.php"; 
?>

<body>

    <?php 
        include_once "templates/php/header.php"; 
        include_once "templates/php/nav.php";
        require './admin/templates/php/vehiculesConnexionBDD.php';
    ?>

    <?PHP
        if(isset($_GET['id'])) {
            $sql = "SELECT * FROM vehicules WHERE id = ?";
            $rs_select = $bdd->prepare($sql);
            $userID = $_GET['id'];
            $rs_select->bindValue(1, $userID, PDO::PARAM_INT);
            $rs_select->execute();
            $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
        }
    ?>

    <main>

        <section class="banner-section d-flex justify-content-center align-items-end">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12">
                        <h1 class="text-white mb-lg-0">Fiche du véhicule</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="services-detail-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <div class="services-image-wrap">
                            <img src="<?= $donnees['pictures1']; ?>" class="services-image img-fluid" alt="">
                            <img src="<?= $donnees['pictures2']; ?>" class="services-image services-image-hover img-fluid" alt="">

                            <div class="services-icon-wrap">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-white mb-0">
                                        <i class="bi-cash me-2"></i> <?= $donnees['price']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="services-info px-4 pt-4">
                            <h2><?= $donnees['title']; ?></h2>

                            <br>

                            <h6>Description</h6>

                            <p><?= $donnees['description1']; ?></p>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12 clean-text">

                        <p><?= $donnees['description2']; ?></p>

                        <br>

                        <h6> Fiche technique</h6>

                        <p><?= $donnees['characteristic']; ?></p>

                        <p><b>Année de mise en circulation :</b> <?= $donnees['years']; ?>.</p>

                        <p><b>Nombre de kilomètre au compteur :</b> <?= $donnees['km']; ?>.</p>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 clean-text">
                        <h2 class="mb-4">Galerie photos</h2>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <a target="_blank" href="<?= $donnees['pictures1']; ?>" class="image-popup">
                            <img src="<?= $donnees['pictures1']; ?>" alt="" class="gallery-image img-fluid">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12 my-4 my-lg-0 my-md-0">
                        <a target="_blank" href="<?= $donnees['pictures2']; ?>" class="image-popup">
                            <img src="<?= $donnees['pictures2']; ?>" alt="" class="gallery-image img-fluid">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <a target="_blank" href="<?= $donnees['pictures3']; ?>" class="image-popup">
                            <img src="<?= $donnees['pictures3']; ?>" alt="" class="gallery-image img-fluid">
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-12">

                        <form class="custom-form consulting-form bg-white shadow-lg mb-5 mb-lg-0" action="./templates/php/sendForm.php" method="POST" role="form">
                            <div class="consulting-form-header d-flex align-items-center">
                                <h3 class="mb-4">Posez-nous vos questions !</h3>
                            </div>

                            <div class="consulting-form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="hidden" name="title" value="<?= $donnees['title'] ?>">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Chuck Norris" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="mail" id="mail" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="votre-adresse@mail.com" required>
                                    </div>
                                </div>

                                <select class="form-select form-control" name="subject" id="subject" required>
                                    <option selected>Votre demande concerne :</option>
                                    <option value="Vehicules">L'achat ou la vente de véhicules</option>
                                    <option value="Mecanique">L'atelier mécanique</option>
                                    <option value="Carrosserie">L'atelier carrosserie</option>
                                    <option value="Nettoyage">Le nettoyage haut de gamme</option>
                                </select>

                                <textarea name="message" rows="3" class="form-control" id="message" placeholder="Votre message" required></textarea>

                                <div class="col-lg-6 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control">Envoyer</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <?php
        include_once "templates/php/partners-section.php";
        ?>
        
    </main>

    <?php
    require_once "templates/php/footer.php";
    ?>

    <script src="./templates/js/jquery.magnific-popup.min.js"></script>

</body>

</html>