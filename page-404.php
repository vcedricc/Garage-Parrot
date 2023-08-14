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
                        <h1 class="text-white mb-lg-0">Erreur - Page 404</h1>
                    </div>

                    <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                    </div>

                </div>
            </div>
        </section>


        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="page-404-title">404</h2>

                        <h3>Cette page n'existe pas !</h3>

                        <p>Merci de sélectionner une autre page dans le menu de navigation ci-dessus</p>

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