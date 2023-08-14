<?php
// Démarrage de la cession :
    session_start();

    require_once 'config.php';

// Conditionnement remplissage champs :
    if(isset($_POST['user']) && isset($_POST['password']))
    {
// Reprise des données transmises par form :
        $user = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['password']);

        $user = preg_replace('/[^A-Za-z0-9\-]/', '', $user);
        $password = preg_replace('/[^A-Za-z0-9\-]/', '', $password);

// Selection dans BDD :
        $check = $bdd->prepare('SELECT user, password, role FROM users WHERE user = ?');
        $check->execute(array($user));
        $data = $check->fetch();
        $row = $check->rowCount();

// Récupération du role :

$userRole = $data['role'];
$_SESSION['userRole'] = $userRole;

// Conditionnement de connexion :
        if($row == 1)
        {   
            if(filter_var($user))
            {
                //$passwordBDD = password_verify($data['password'], '$password');
                //$password = crypt($password, PASSWORD_BCRYPT);

                if($data['password'] === $password)
                {
                    $_SESSION['user'] = $data['user'];
                    header('Location:../../landing.php');
                } else
                    header('Location:../../index.php?login_err=password');
            } else
                header('Location:../../index.php?login_err=user');
        } else
            header('Location:../../index.php?login_err=already');
    } else
        header('Location:../../index.php');
