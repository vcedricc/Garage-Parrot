<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<body>

<main>

<?php
    $message = "";

    if (isset($_POST['create'])) {
        if (empty($_POST['user']) || empty($_POST['password'])) {
            $message = '<p class="error">Veuillez remplir tous les champs !</p>';
        } else {
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $sql="INSERT INTO `users`(`user`,`password`,`role`) VALUES(?,?,?)";
            
            $rs_insert=$bdd->prepare($sql);

            $user=$_POST['user'];
            $password=$_POST['password'];
            $roleValue=$_POST['role'];
         
            $role = ($roleValue == 'role0') ? 0 : 1;

            if ($rs_insert->execute([$user, $password, $role])) {
                $message = '<p class="error">Compte créé avec succès</p>';
                header('Location: ./landing.php#prestationsAnchor');
            } else {
                $message = '<p class="error">Une erreur a eu lieu !</p>';
            }
        }
    }
  
?>

    <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Création d'un compte</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="user" class="form-label">Nom d'utilisateur :</label>
                                    <input type="text" name="user" class="form-control" id="user" placeholder="Exemple : Nom de famille">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe :</label>
                                    <i class="bi bi-info-circle" title="La personne doit choisir son mot de passe à l'abri de tous regards, même du votre !"></i>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rôle :</label>
                                    <select class="form-select" id="role" name="role">
                                        <option value="role0">Employé</option>
                                        <option value="role1">Administrateur</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button name="create" type="submit" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3">Créer le compte</button>
                                </div>
                            </form>
                            <a class="mt-4" href="./landing.php">< Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

</body>
</html>