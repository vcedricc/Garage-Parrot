<?PHP
    require_once './templates/php/config.php';
    require_once './templates/php/sessionStart.php';
    include_once './templates/php/head.php';
?>

<?PHP
    $message="";

    /*------------------------------
    UPDATE FUNCTION
    ------------------------------*/

    if(isset($_POST['update'])) {
        $sqlUpdate = "UPDATE users SET user = ?, password = ?, role = ? WHERE id = ?";
        $rs_update=$bdd->prepare($sqlUpdate);

        $user = $_POST['user'];
        $password = $_POST['password'];
        $roleValue=$_POST['role'];
        $role = ($roleValue == 'role0') ? 0 : 1;
        $id = $_POST['id'];
        
        $rs_update->bindValue(1, $user, PDO::PARAM_STR);
        $rs_update->bindValue(2, $password, PDO::PARAM_STR);
        $rs_update->bindValue(3, $role, PDO::PARAM_INT);
        $rs_update->bindValue(4, $id, PDO::PARAM_INT);
        $rs_update->execute();

        $message = '<p class="error">Modification pris en compte</p>';
    }


    /*------------------------------
    DATA DISPLAY
    ------------------------------*/
    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $rs_select = $bdd->prepare($sql);
        $userID = $_GET['id'];
        $rs_select->bindValue(1, $userID, PDO::PARAM_INT);
        $rs_select->execute();
        $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

        $user = $donnees['user'];
        $password = $donnees['password'];
        $role=$donnees['role'];

    } else {
        $user = "";
        $password = "";
        $role = "";
    }
?>

<body>

<main>

<div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Modification d'un compte</h3>
                        </div>

                        <?PHP
                            echo $message;
                        ?>

                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $_GET['id']; ?>">

                                    <label for="user" class="form-label">Nom d'utilisateur :</label>
                                    <input type="text" name="user" class="form-control" id="user" value="<?= $user; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe :</label>
                                    <i class="bi bi-info-circle" title="La personne doit choisir son mot de passe à l'abri de tous regards, même du votre !"></i>
                                    <input type="password" name="password" class="form-control" id="password" value="<?= $password; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rôle :</label>
                                    <select class="form-select" id="role" name="role">
                                        <option value="role0" <?php if ($role == 0) { echo 'selected'; } ?>>Employé</option>
                                        <option value="role1" <?php if ($role == 1) { echo 'selected'; } ?>>Administrateur</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <form action="./createUser.php">
                                        <button name="update" class="btn custom-btn custom-border-btn btn-smoothscroll mt-3" type="submit">Modifier</button>
                                    </form>
                                </div>
                            </form>
                            <a class="mt-4" href="./landing.php#prestationsAnchor">< Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

</body>
</html>