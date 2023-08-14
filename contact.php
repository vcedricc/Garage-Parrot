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
                        <h1 class="text-white mb-lg-0">Nous contacter</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="contact-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-12 me-auto mb-lg-0 mb-5">
                        <h2 class="my-3">On peux vous aider ?</h2>

                        <p>Vous avez des questions ou besoin de conseils avisés concernant votre précieuse voiture de luxe ou de collection ?
                        </p>
                        <p>Remplissez notre formulaire de contact dès maintenant et notre équipe d'experts se fera un plaisir de vous guider avec passion et expertise pour répondre à toutes vos interrogations.
                        </p>

                        <div class="contact-info bg-white shadow-lg">
                            <h3 class="mb-4">Contact Information</h3>

                            <?php
                                include './admin/templates/php/officeConnexionBDD.php';

                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <h5 class="d-flex mt-3 mb-3">
                                <i class="bi-geo-alt-fill custom-icon me-3"></i><?= $donnees['address'] ?>
                            </h5>

                            <h5 class="d-flex mb-3">
                                <i class="bi-telephone-fill custom-icon me-3"></i>

                                <a href="tel:<?= $donnees['phone'] ?>">
                                    <?= $donnees['phone'] ?>
                                </a>
                            </h5>

                            <h5 class="d-flex">
                                <i class="bi-envelope-fill custom-icon me-3"></i>

                                <a href="mailto:<?= $donnees['mail'] ?>">
                                    <?= $donnees['mail'] ?>
                                </a>
                            </h5>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <form class="custom-form consulting-form bg-white shadow-lg mb-5 mb-lg-0" action="./templates/php/sendForm.php" method="POST" role="form">
                            <div class="consulting-form-header d-flex align-items-center">
                                <h3 class="mb-4">Posez-nous vos questions !</h3>
                            </div>

                            <div class="consulting-form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
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
    </main>

    <?php 
    require_once "templates/php/footer.php"; 
    ?>

</body>

</html>