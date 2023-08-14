<nav class="navbar navbar-expand-lg">
        <div class="container container-nav">
            <a class="navbar-brand" href="index.php">
                <img src="./image/GARAGE V. PARROT.png" class="logo img-fluid" alt="Logo du garage Vincent Parrot">
                <span class="ms-2">Garage Parrot</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="vehicules.php">Nos véhicules</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos prestations</a>

                        <?php
                                include_once './admin/templates/php/prestationsConnexionBDD.php';
                        ?>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">

                            <?php
                                while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <li><a class="dropdown-item" href="prestationsDetails.php?id=<?php echo $donnees['id']; ?>"><?= $donnees['title1'] ?></a></li>

                            <?PHP
                                }
                            ?>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Nous contacter</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>