<?PHP
    include_once './templates/php/head.php';

    session_start()
?>

<body>

    <main>
        
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="connection p-4">
                    <h6 class="p-white">Identifiant :</h6>
                    <form action="./templates/php/connexion.php" method="POST">
                        <label for="user"></label>
                        <input class="form-control" type="text" id="user" name="user" placeholder="Nom d'utilisateur" required>

                        <h6 class="p-white">Mot de passe :</h6>
                        <label for="password"></label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="xxxxxxxx" required>

                        <button class="btn custom-btn custom-border-btn custom-btn-bg-white btn-smoothscroll mt-3" type="submit">Connexion</button>
                    </form>
                </div>

                    <?php
                        /*-------------------------------
                        Error Gestion
                        ---------------------------------*/
                            if(isset($_GET['login_err']))
                                {
                                    $err = htmlspecialchars($_GET['login_err']);

                                        switch($err)
                                            {
                                            case 'password':
                                                ?>
                                                    <div>
                                                        <p class="error"><strong>Erreur !</strong> mot de passe incorrect !</p>
                                                    </div>
                                                <?php
                                            break;

                                            case 'user';
                                                ?>
                                                    <div>
                                                        <p class="error"><strong>Erreur !</strong> identifiant incorrect !</p>
                                                    </div>
                                                <?php
                                            break;

                                            case 'already';
                                                ?>
                                                    <div>
                                                        <p class="error"><strong>Erreur !</strong> compte non existant !</p>
                                                    </div>
                                                <?php
                                            break;
                                            }
                                }
                    ?>  

            </div>
        </div>
    </div>

    </main>

</body>
