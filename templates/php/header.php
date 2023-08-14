<?php
    include 'admin/templates/php/config.php';
    include_once 'admin/templates/php/officeConnexionBDD.php';
?>

<header class="site-header" id="header-page">
        <section class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="slogan me-4 mb-0">
                        Réparation, rénovation et vente de véhicules de luxe et de collection !
                    </p>

                    <?php
                        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <p class="site-header-icon-wrap text-white d-flex mb-0 ms-auto">
                        <i class="site-header-icon bi-whatsapp me-2"></i>
                        <a href="tel:<?= $donnees['phone'] ?>" class="text-white">
                            <?= $donnees['phone'] ?>
                        </a>
                    </p>
                </div>

            </div>
        </section>
    </header>