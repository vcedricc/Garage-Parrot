<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center">
                <form action="./templates/php/deconnexion.php" class="d-flex col flex-column justify-content-center align-items-center">
                    <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Se déconnecter</button>
                    <p>N'oubliez pas de vous déconnecter quand vous avez fini !</p>
                </form>
        </div>
    </div>

    <!-----------------------------------
    Customers' opinion
    ------------------------------------>

    <div class="container mt-4">
        <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Avis clients</h3>
                        </div>
                        <div class="card-body text-center">

                        <?PHP
                            require_once './templates/php/opinionsConnexionBDD.php'
                        ?>

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Nom et prénom</th>
                                <th>P</th>
                                <th>Note</th>
                                <th>Val</th>
                                <th>Sup</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <tr>
                                <td>                                    
                                    <?PHP 
                                        if ($donnees['statut'] != 1 && ($donnees['statut'] != 2)) {
                                            echo '<i class="bi bi-balloon-heart-fill newOpinion"></i> '.$donnees['name'].' '.$donnees['firstname']; 
                                        } elseif ($donnees['statut'] == 2) {
                                            echo '<i class="bi bi-yelp newOpinion"></i> '.$donnees['name'].' '.$donnees['firstname'];
                                        } else {
                                            echo $donnees['name'].' '.$donnees['firstname'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?= $donnees['prestations']; ?>
                                </td>
                                <td>
                                    <?=  $donnees['notation']; ?>
                                </td>
                                <td>
                                    <a href="updateOpinions.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="deleteOpinions.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-x-square"></i></a>
                                </td>
                            </tr>

                            <?PHP
                                }
                            ?>

                            </tbody>
                            </table>
                            <p><i class="bi bi-balloon-heart-fill newOpinion"></i> = Avis client à valider, <i class="bi bi-yelp newOpinion"></i>Avis non publié</p>
                            <p>M = Mécanique, C = Carrosserie, N = Nettoyage, V = Vente</p>
                            <form action="./createOpinions.php">
                                <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Créer un nouvel avis</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-----------------------------------
                Vehicules
                ------------------------------------>

                <div class="col-md-6">
                    <div class="card">

                        <?PHP
                            require_once './templates/php/vehiculesConnexionBDD.php';
                        ?>

                        <div class="card-header text-center">
                            <h3>Véhicules</h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Véhicules</th>
                                <th>Année</th>
                                <th>Cat</th>
                                <th>Mod</th>
                                <th>Sup</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['title']; ?>
                                </td>
                                <td>
                                    <?= $donnees['years']; ?>
                                </td>
                                <td>
                                    <?= $donnees['category']; ?>
                                </td>
                                <td>
                                    <a href="updateVehicules.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="deleteVehicules.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-x-square"></i></a>
                                </td>
                            </tr>

                            <?PHP
                                }
                            ?>

                            </tbody>
                            </table>
                            <form action="./createVehicules.php" class="text-center">
                                <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Nouveau véhicule</button>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    
    <?php 
        if ($_SESSION['userRole']) {
    ?>
    
        <!-----------------------------------
        Prestations
        ------------------------------------>
        <div id="prestationsAnchor" class="container mt-4">
            <div class="row">

                <?PHP
                    require_once './templates/php/prestationsConnexionBDD.php';
                ?>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Prestations</h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Service</th>
                                <th>Note</th>
                                <th>Mod</th>
                                <th>Sup</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                                    
                                    $prestationId = $donnees['id'];

                                    // Requête pour récupérer la notation depuis la table "notice" en fonction de l'ID de la prestation
                                    $stmt = $bdd->prepare("SELECT AVG(notation) * 5 AS notation FROM notice WHERE prestations = :prestationId");
                                    $stmt->bindParam(':prestationId', $prestationId, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $notation = $result['notation'];

                                    // Si la notation est NULL (absente), afficher "N/C" à la place
                                    $notation = ($notation !== null) ? $notation : "N/C";

                                    // Requête pour insérer la notation dans la colonne "notation" de la table "prestations"
                                    $insertStmt = $bdd->prepare("UPDATE prestations SET notation = :notation WHERE id = :prestationId");
                                    $insertStmt->bindParam(':prestationId', $prestationId, PDO::PARAM_INT);
                                    $insertStmt->bindParam(':notation', $notation, PDO::PARAM_INT);
                                    $insertStmt->execute();

                            ?>
                            

                            <tr>
                                <td>                                    
                                    <?= $donnees['title1']; ?>
                                </td>
                                <td>
                                    <?= $notation; ?>
                                </td>
                                <td>
                                    <a href="updatePrestations.php?id=<?PHP echo $donnees['id']; ?>">
                                    <i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <a href="deletePrestations.php?id=<?PHP echo $donnees['id']; ?>">
                                    <i class="bi bi-x-square"></i></a>
                                </td>
                            </tr>

                            <?PHP
                                }
                            ?>

                            </tbody>
                            </table>
                            <form class="text-center" action="./createPrestations.php">
                                <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Créer une prestation</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!-----------------------------------
                Account management
                ------------------------------------>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Gestion des comptes</h3>
                        </div>
                        <div class="card-body">

                            <?php

                                require './templates/php/usersConnexionBDD.php'

                            ?>

                            <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Nom d'utilisateur</th>
                                <th>Type de compte</th>
                                <th>Mod</th>
                                <th>Sup</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['user'] ?>
                                </td>
                                <td>
                                    <?=  $role = ($donnees['role'] == 0) ? 'employé' : 'administrateur';
                                    ?>
                                </td>
                                <td>
                                    <a href="updateUser.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <a href="deleteUser.php?id=<?php echo $donnees['id']; ?>">
                                    <i class="bi bi-x-square"></i></a>
                                </td>
                            </tr>

                            <?PHP
                                }
                            ?>

                            </tbody>
                            </table>

                            <form class="text-center" action="./createUser.php">
                                <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Créer un compte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            }
        ?>

        <!-----------------------------------
        Account society
        ------------------------------------>

        <?php 
            if ($_SESSION['userRole']) {
        ?>

        <div id="societyAnchor" class="container mt-4">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Gestion de l'établissement</h3>
                        </div>
                        <div class="card-body">

                        <?php
                            require './templates/php/officeConnexionBDD.php';
                        ?>

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Téléphone</th>
                                <th>Email</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC)
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['phone'] ?>
                                </td>
                                <td>
                                    <?=  $donnees['mail'] ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <?php
                            require './templates/php/officeConnexionBDD.php';
                        ?>

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th class="col-md-5">Jours d'ouverture 1</th>
                                <th class="col-md-5">Heures d'ouverture 1</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC)
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['days1'] ?>
                                </td>
                                <td>
                                    <?= $donnees['hours1'] ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <?php
                            require './templates/php/officeConnexionBDD.php';
                        ?>

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th class="col-md-6">Jours d'ouverture 2</th>
                                <th class="col-md-6">Heures d'ouverture 2</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC)
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['days2'] ?>
                                </td>
                                <td>
                                    <?= $donnees['hours2'] ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <?php
                            require './templates/php/officeConnexionBDD.php';
                        ?>

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th>Adresse</th>
                            </thead>
                            <tbody class="text-center">

                            <?php
                                $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <tr>
                                <td>                                    
                                    <?= $donnees['address'] ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <form class="text-center" action="./updateSociety.php">
                            <button class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Modifier les informations</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            <?php 
                }
            ?>
        </div>

    <!-- Incluez les scripts JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="./templates/js/bootstrap.min.js"></script>
</body>
</html>
