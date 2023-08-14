<?php 
    require_once 'templates/php/head.php'; 
?>

<body>

    <?php 
    include_once "templates/php/header.php"; 
    include_once "templates/php/nav.php"; 
    ?>

    <main>

        <section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12 text-center mx-auto">
                        <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                            <span>Spécialiste des véhicules</span>
                            <span class="cd-words-wrapper">
                                    <b class="is-visible">anciens</b>
                                    <b>de luxes</b>
                            </span>
                        </h1>

                        <a class="custom-btn custom-border-btn custom-btn-bg-white btn button button--pan smoothscroll margin-right-hero-section" href="#intro-section">
                            <span>Présentation de nos services</span>
                        </a>

                        <a class="custom-btn custom-border-btn custom-btn-bg-white btn button button--pan smoothscroll" href="#services-section">
                            <span>Regarder nos prestations</span>
                        </a>
                    </div>

                </div>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L40,229.3C80,235,160,245,240,250.7C320,256,400,256,480,240C560,224,640,192,720,176C800,160,880,160,960,138.7C1040,117,1120,75,1200,80C1280,85,1360,139,1400,165.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
        </section>


        <section class="intro-section" id="intro-section">
            <div class="container">
                <div class="row justify-content-lg-center align-items-center">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Services de mécanique et de vente de véhicules</h2>

                        <p>Découvrez notre entreprise spécialisée en réparation, rénovation et vente de véhicules d'occasion. Passionnés par l'art automobile, nous préservons ces trésors mécaniques avec expertise.
                        </p>
                        <p>
                            Nos réparations sont fidèles et nous favorisons l'utilisation de pièces d'origines sur tous les véhicules.
                        </p>
                        <p>Confiez-nous l'entretien de votre voiture d'exception ou trouvez votre prochaine pièce de collection chez nous.
                        </p>
                    </div>

                    <div class="col-lg-6 col-12 custom-block-wrap">
                        <img src="image/mechanic-removebg-preview.png" alt="Un de nos mécaniciens" class="img-fluid">

                        <div class="custom-block d-flex flex-column">
                            <h6 class="text-white mb-3">Besoin de conseils ? <br> Appellez nous :</h6>

                            <p class="d-flex mb-0">
                                <i class="bi-telephone custom-icon me-2"></i>

                                <?php
                                    include './admin/templates/php/officeConnexionBDD.php';

                                    $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                                ?>

                                <a href="tel:<?= $donnees['phone'] ?>">
                                    <?= $donnees['phone'] ?>
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="services-section section-padding section-bg" id="services-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-4">Nos prestations les plus demandées</h2>
                    </div>

                    <?PHP
                        include './admin/templates/php/prestationsConnexionBDD.php';
                    
                        while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            $prestationID = $donnees['id'];
                    ?>
                        <div class="col-lg-6 col-12">
                            <div class="services-thumb">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12">
                                        <div class="services-image-wrap">
                                            <a href="prestationsDetails.php?id=<?= $prestationID; ?>">
                                                <img src="<?= $donnees['pictures1']; ?>" class="services-image img-fluid" alt="">
                                                <img src="<?= $donnees['pictures2']; ?>" class="services-image services-image-hover img-fluid" alt="">

                                                <div class="services-icon-wrap">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-white mb-0">
                                                            <i class="bi-cash me-2"></i> <?= $donnees['price']; ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                        <div class="services-info mt-4 mt-lg-0 mt-md-0">
                                            <h4 class="services-title mb-1 mb-lg-2">
                                                <a class="services-title-link" href="prestationsDetails.php?id=<?= $prestationID; ?>"><?= $donnees['title1']; ?></a>
                                            </h4>

                                            <p><?= $donnees['textCourt']; ?></p>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <div class="reviews-icons">
                                                    <!-- futur emplacement notation -->
                                                </div>

                                                <a href="prestationsDetails.php?id=<?= $prestationID; ?>" class="custom-btn btn button button--atlas mt-2 ms-auto">
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
                    <?PHP
                        }
                    ?>

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
                                                        <i class="bi-cash me-2"></i> voir nos modèles
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


        <section id="opinions" class="testimonial-section section-padding section-bg">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center">
                <div class="row vw-100">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="text-white mb-4">Les avis de nos clients</h2>
                    </div>

                    <div class="d-flex row-cols-3 flex-wrap justify-content-center align-content-center vw-100">

                        <?php
                            include 'admin/templates/php/opinionsConnexionBDD.php';  
                        
                            $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);  
                        
                            while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                                if ($donnees['statut'] == null || $donnees['statut'] == 2) {
                                // Do nothing
                                } else {
                        ?>

                        <div class="featured-block col-12 col-lg-3 me-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="image/avatar/person-circle.svg" class="avatar-image img-fluid">
                                <div class="ms-3">
                                    <h4 class="mb-0">
                                        <?= $donnees['firstname'];
                                        ?>
                                    </h4>
                                    <div class="reviews-icons mb-1">
                                    <?php
                                        if ($donnees['notation'] < 0.5) {
                                            echo '<i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 0.5 && $donnees['notation'] < 1) {
                                            echo '<i class="bi bi-star-half"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 1 && $donnees['notation'] < 1.5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 1.5 && $donnees['notation'] < 2) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-half"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 2 && $donnees['notation'] < 2.5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 2.5 && $donnees['notation'] < 3) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-half"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 3 && $donnees['notation'] < 3.5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 3.5 && $donnees['notation'] < 4) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-half"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 4 && $donnees['notation'] < 4.5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi bi-star"></i>';
                                        } elseif ($donnees['notation'] >= 4.5 && $donnees['notation'] < 5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>';
                                        } elseif ($donnees['notation'] == 5) {
                                            echo '<i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>';
                                        }
                                    ?>

                                    </div>
                                </div>
                            </div>
                            <p class="mb-0"><?= $donnees['text'] ?>
                            </p>
                        </div>

                        <?PHP
                            }}
                        ?>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row col-lg-5 col-12 text-center mx-auto mt-4">
                    <a href="./createOpinions.php" class=" justify-content-center custom-btn custom-border-btn custom-btn-bg-white btn button button--pan smoothscroll me-3" href="#">
                        <span>Vous souhaitez nous laisser votre avis</span>
                    </a>
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

    <script src="./templates/js/custom.js"></script>
    <script src="./templates/js/animated-headline.js"></script>

</body>

</html>