<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Verifier si user a bien completer tout les champs
    if (!empty($_POST['email']) and !empty($_POST['pseudo']) and !empty($_POST['password'])) {


        //Les données de l'user
        $user_email = htmlspecialchars($_POST['email']);
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //verifier si l'utilisateur existe deja sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ? ');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            //inserer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email, pseudo, mdp)VALUES(?,?,?)');
            $insertUserOnWebsite->execute(array($user_email, $user_pseudo, $user_password));

            //recuperer les infos de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, email, pseudo FROM users WHERE pseudo = ? AND email = ?');
            $getInfosOfThisUserReq->execute(array($user_email, $user_pseudo));

            $userInfos = $getInfosOfThisUserReq->fetch();

            if (gettype($userInfos) === 'boolean') {
                $userInfos = '';
            } else {
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['email'] = $userInfos['email'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];
            }

            //authentifier l'utilisateur sur le site et recuperer ses données dans des variables globales SESSION



            //rediriger l'utilisateur vers la page d'acceuil
            header('Location: index.html.php');
        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }
    } else {
        $errorMsg = "Veuillez completer tous les champs...";
    }
}
