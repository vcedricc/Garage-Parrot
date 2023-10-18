<?php 
require_once "./templates/php/head.php"; 
?>

<body>

    <?PHP
    include_once "./templates/php/header.php";
    include_once "./templates/php/nav.php";
    require "./admin/templates/php/prestationsConnexionBDD.php";
    ?>

    <?PHP
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
        $underTitle1 = $donnees['underTitle1'];
        $text1 = $donnees['text1'];
        $underTitle2 = $donnees['underTitle2'];
        $text2 = $donnees['text2'];
        $text3 = $donnees['text3'];
        $price = $donnees['price'];
        $duration = $donnees['duration'];
    }
    ?>

    <main>

        <section class="banner-section d-flex justify-content-center align-items-end">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12">
                        <h1 class="text-white mb-lg-0"><?= $title1; ?>
                    </div>

                </div>
            </div>
        </section>


        <section class="services-detail-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <div class="services-image-wrap">
                            <img src="<?= $pictures1; ?>" class="services-image img-fluid" alt="">
                            <img src="<?= $pictures2; ?>" class="services-image services-image-hover img-fluid" alt="">

                            <div class="services-icon-wrap">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-white mb-0">
                                        <i class="bi-cash me-2"></i> <?= $price; ?>
                                    </p>
                                    <p class="text-white mb-0">
                                        <i class="bi-clock-fill me-2"></i> <?= $duration; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="services-info px-4 pt-4">
                            <h2 class="mb-4"><?= $title2; ?></h2>

                            <h6 class="mt-4"><?= $underTitle1; ?></h6>

                            <p><?= $text1; ?></p>

                            <h6><?= $underTitle2; ?></h6>

                            <p><?= $text2 ?></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 clean-text">
                        <p><?= $text3; ?></p>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-4">Ces services peuvent vous intéresser :</h2>
                    </div>


                    <?PHP
                        if (isset($_GET['id'])) {
                        $userID = $_GET['id'];
                        function generateRandomID($userID) {
                        $randomID = rand(2, 4);
                                    
                        while ($randomID == $userID) {
                        $randomID = rand(2, 4);
                        }
                                    
                            return $randomID;
                        }

                        $randomID = generateRandomID($userID);

                        $sql = "SELECT * FROM prestations WHERE id = ?";
                        $rs_select = $bdd->prepare($sql);
                        $rs_select->bindValue(1, $randomID, PDO::PARAM_INT);
                        $rs_select->execute();

                        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

                        $title1 = $donnees['title1'];
                        $pictures1 = $donnees['pictures1'];
                        $pictures2 = $donnees['pictures2'];
                        $textCourt = $donnees['textCourt'];
                        $price = $donnees['price'];
                        $duration = $donnees['duration'];
                        }
                    ?>

                    <div class="col-lg-6 col-12">
                        <div class="services-thumb mb-lg-0">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="prestationsDetails.php?id=<?= $randomID; ?>">
                                            <img src="<?= $pictures1; ?>" class="services-image img-fluid" alt="">
                                            <img src="<?= $pictures2; ?>" class="services-image services-image-hover img-fluid" alt="">

                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i> <?= $price; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="prestationsDetails.php?id=<?= $randomID; ?>"><?= $title1; ?></a>
                                        </h4>

                                        <p><?= $textCourt; ?></p>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="reviews-icons">
                                                <!-- futur emplacement notation -->
                                            </div>

                                            <a href="prestationsDetails.php?id=<?= $randomID; ?>" class="custom-btn btn button button--atlas mt-2 ms-auto">

                                                <div class="marquee" aria-hidden="true">
                                                    <div class="marquee__inner">
                                                        <span>En savoir plus...</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="services-thumb mb-lg-0">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="vehicules.php">
                                            <img src="image/services/PexelsCar21.jpg" class="services-image img-fluid" alt="">
                                            <img src="image/services/PexelsCar17.jpg" class="services-image services-image-hover img-fluid" alt="">
                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">

                                                        <i class="bi-cash me-2"></i> selon modèle
                                                    </p>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="vehicules.php">Véhicules de collection</a>
                                        </h4>

                                        <p>Découvrez notre collection unique de véhicules anciens, où vous trouverez des voitures classiques et emblématiques qui ont traversé les décennies avec élégance. Que vous soyez un passionné ou un collectionneur,
                                            notre équipe vous aidera à trouver le véhicule de vos rêves.
                                        </p>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="reviews-icons">
                                                <!-- futur emplacement notation -->
                                            </div>

                                            <a href="vehicules.php" class="custom-btn btn button button--atlas mt-2 ms-auto">

                                                <div class="marquee" aria-hidden="true">
                                                    <div class="marquee__inner">
                                                        <span>En savoir plus...</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
        include_once "templates/php/partners-section.php"
        ?>

    </main>

    <?php 
    require_once "templates/php/footer.php"; 
    ?>

</body>

</html>