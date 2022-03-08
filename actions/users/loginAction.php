<?php
session_start();
require('actions/database.php');



//Validation du formulaire
if (isset($_POST['validate'])) {

    //Verifier si user a bien completer tout les champs
    if (!empty($_POST['email']) and !empty($_POST['password'])) {


        //Les données de l'user
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        //verifier si l'user existe (si le mail est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $checkIfUserExists->execute(array($user_email));

        if ($checkIfUserExists->rowCount() > 0) {

            //recuperer les données de l'user
            $usersInfos = $checkIfUserExists->fetch();


            //verifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfos['mdp'])) {

                //authentifier l'utilisateur sur le site et recuperer ses données dans des variables globales SESSION

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];



                //redirige l'user vers la page d'acceuil
                header('Location: index.html.php');
            } else {
                $errorMsg = "Votre mot de passe est incorrect";
            }
        } else {
            $errorMsg = "Compte inexistant";
        }
    } else {
        $errorMsg = "Veuillez completer tous les champs...";
    }
}
