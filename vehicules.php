<!doctype html>
<?php 
require_once "templates/php/head.php"; 
?>

<body>

    <?php 
    include_once "templates/php/header.php"; 
    include_once "templates/php/nav.php";
    ?>

    <main>

        <section class="banner-section d-flex justify-content-center align-items-end">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12">
                        <h1 class="text-white mb-lg-0">Nos véhicules</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="col-lg-12 col-12 text-center">
            <div class="container mb-2 mt-4 d-flex align-items-center justify-content-center">
                <div class="row align-range">
                    <div class="col-md-3 margin-range">
                        <input oninput="filterResults()" type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
                    </div>
                    <div class="col-md-3 d-flex align-items-center margin-range">
                        <div class="flex-column">
                            <div>
                                <label for="priceRange" class="text-center custom-range-label">Prix (€) :</label>
                                <span id="priceValue"></span>
                            </div>

                            <?PHP
                                require './admin/templates/php/vehiculesConnexionBDD.php';

                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div>
                                <input value="500000" oninput="filterResults()" type="range" id="priceRange" min="0" max="500000" step="1000" class="form-control-range" data-price="<?= $donnees['price']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center margin-range">
                        <div class="flex-column">
                            <div>
                                <label for="mileageRange" class="text-center custom-range-label">Km :</label>
                                <span id="mileageValue"></span>
                            </div>
                            <div>
                                <input value="250000" oninput="filterResults()" type="range" id="mileageRange" min="0" max="250000" step="1000" class="form-control-range">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center margin-range">
                        <div class="flex-column">
                            <div>
                                <label for="yearRange" class="text-center custom-range-label">Année :</label>
                                <span id="yearValue"></span>
                            </div>
                            <div>
                                <input value="2023" oninput="filterResults()" type="range" id="yearRange" min="1930" max="2023" step="1" class="form-control-range">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="services-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="text-black mb-4">Catégorie "collection"</h2>
                    </div>

                    <?PHP
                        require './admin/templates/php/vehiculesConnexionBDD.php';
                    ?>

                    <?php
                        while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            $prestationID = $donnees['id'];

                            if($donnees['category'] == 'collection') {
                    ?>

                    <div class="col-lg-6 col-12 vignetteAuto">
                        <div class="services-thumb section-bg">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="vehiculesDetails.php?id=<?= $prestationID; ?>">
                                            <img src="<?= $donnees['pictures1']; ?>" class="services-image img-fluid" alt="">
                                            <img src="<?= $donnees['pictures2']; ?>" class="services-image services-image-hover img-fluid" alt="">

                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i> <span class="price" data-price="<?= $donnees['price']; ?>"><?= $donnees['price']; ?> €</span>
                                                    </p>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0 services-md-max">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="vehiculesDetails.php?id=<?= $prestationID; ?>"><span class="title"><?= $donnees['title']; ?></span></a>
                                        </h4>

                                        <p>
                                            <?= $donnees['textCourt']; ?>
                                            <b>Année de mise en circulation</b> : <span class="years"><?= $donnees['years']; ?></span>
                                            <b>Nombre de kilomètre au compteur</b> : <span class="km"><?= $donnees['km']; ?></span>
                                        </p>

                                        <div class="d-flex flex-wrap align-items-center">

                                            <a href="vehiculesDetails.php?id=<?= $prestationID; ?>" class="custom-btn btn button button--atlas mt-2 ms-auto">

                                                <div class="marquee">
                                                    <div class="marquee__inner">
                                                        <span>Voir les caractéristiques</span>
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
                        }}
                    ?>

                    </div>
                </div>
            </div>

        </section>


        <section class="services-section section-padding section-bg">

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 id="lux-car" class="text-black mb-4">Catégorie "luxe"</h2>
                    </div>

                    <?PHP
                        require './admin/templates/php/vehiculesConnexionBDD.php';
                    ?>

                    <?php
                        while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            $prestationID = $donnees['id'];

                            if($donnees['category'] == 'luxe') {
                    ?>

                    <div class="col-lg-6 col-12 vignetteAuto">
                        <div class="services-thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="vehiculesDetails.php?id=<?= $prestationID; ?>">
                                            <img src="<?= $donnees['pictures1']; ?>" class="services-image img-fluid" alt="">
                                            <img src="<?= $donnees['pictures2']; ?>" class="services-image services-image-hover img-fluid" alt="">

                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i> <span class="price" data-price="<?= $donnees['price']; ?>"><?= $donnees['price']; ?> €</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0 mt-md-0 services-md-max">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="vehiculesDetails.php?id=<?= $prestationID; ?>"><span class="title"><?= $donnees['title']; ?></span></a>
                                        </h4>

                                        <p>
                                            <?= $donnees['textCourt']; ?> 
                                            <b>Année de mise en circulation</b> : <span class="years"><?= $donnees['years']; ?></span>
                                            <b>Nombre de kilomètre au compteur</b> : <span class="km"><?= $donnees['km']; ?></span>
                                        </p>

                                        <div class="d-flex flex-wrap align-items-center">

                                            <a href="vehiculesDetails.php?id=<?= $prestationID; ?>" class="custom-btn btn button button--atlas mt-2 ms-auto">

                                                <div class="marquee">
                                                    <div class="marquee__inner">
                                                        <span>Voir les caractéristiques</span>
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
                        }}
                    ?>
                    
                </div>
            </div>
        </section>

        <?php
        include_once "templates/php/partners-section.php"
        ?>
        
    </main>
    
    <script src="./templates/js/script.js"></script>

    <?php 
    require_once "templates/php/footer.php"; 
    ?>

</body>

</html>