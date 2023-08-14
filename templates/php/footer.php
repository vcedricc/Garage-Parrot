<?PHP
    require 'admin/templates/php/officeConnexionBDD.php';
?>

<footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex align-items-center mb-4 pb-2">
                    <div>
                        <img src="image/GARAGE V. PARROT.png" class="logo img-fluid" alt="Logo du Garage Vincent Parrot">
                    </div>

                    <ul class="footer-menu d-flex flex-wrap ms-5">
                        <li class="footer-menu-item"><a href="#header-page" class="footer-menu-link"><i class="bi bi-caret-up-fill custom-icon me-2"></i>Revenir en haut de page</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Nos services</h5>

                    <ul class="footer-menu">

                        <?php
                            include './admin/templates/php/prestationsConnexionBDD.php';

                            while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <li class="footer-menu-item">
                            <a href="prestationsDetails.php?id=<?php echo $donnees['id']; ?>" class="footer-menu-link">
                                <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i> <?= $donnees['title1'] ?>
                            </a>
                        </li>

                        <?PHP
                            }
                        ?>

                        <li class="footer-menu-item">
                            <a href="vehicules.php" class="footer-menu-link">
                                <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i> Véhicules de collection
                            </a>
                        </li>

                        <li class="footer-menu-item">
                            <a href="vehicules.php#lux-car" class="footer-menu-link">
                                <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i> Véhicules de luxe
                            </a>
                        </li>
                    </ul>
                </div>

                <?php
                    include './admin/templates/php/officeConnexionBDD.php';

                    $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Nos bureaux</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        <i class="bi-geo-alt-fill me-2"></i> 
                        <?= $donnees['address'] ?>
                    </p>

                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone-fill me-2"></i>

                        <a href="tel: <?= $donnees['phone'] ?>" class="site-footer-link">
                                <?= $donnees['phone'] ?>
                            </a>
                    </p>

                    <p class="text-white d-flex">
                        <i class="bi-envelope-fill me-2"></i>

                        <a href="mailto:<?= $donnees['mail'] ?>" class="site-footer-link">
                            <?= $donnees['mail'] ?>
                        </a>
                    </p>

                    <ul class="social-icon mt-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link button button--skoll">
                                <span></span>
                                <span class="bi-twitter"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link button button--skoll">
                                <span></span>
                                <span class="bi-facebook"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link button button--skoll">
                                <span></span>
                                <span class="bi-instagram"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6 mt-3 mt-lg-0 mt-md-0 hours-bottom-page">
                    <h5 class="text-white mb-3">Horaires d'ouverture</h5>

                    <strong class="d-block text-white mb-1"><?= $donnees['days1'] ?></strong>

                    <p class="text-white mb-3"><?= $donnees['hours1'] ?></p>

                    <strong class="d-block text-white mb-1"><?= $donnees['days2'] ?></strong>

                    <p class="text-white mb-0"><?= $donnees['hours2'] ?></p>

                </div>
            </div>
        </div>

    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="./templates/js/jquery.min.js"></script>
    <script src="./templates/js/jquery.backstretch.min.js"></script>
    <script src="./templates/js/nav.js"></script>
    <script src="./templates/js/bootstrap.min.js"></script>
    <script src="./templates/js/counter.js"></script>
    <script src="./templates/js/modernizr.js"></script>
