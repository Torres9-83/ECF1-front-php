<?php

require('actions/database.php');

//recuperer l'id de l'user
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //l'id de l'user
    $idOfUser = $_GET['id'];

    //verifier si l'user existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo FROM users WHERE id =?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){

        //recuperer toutes les données de l'user
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];

        //recuperer tous les articles de l'user
        $getHisArticles = $bdd->prepare('SELECT * FROM articles WHERE id_auteur = ?');
        $getHisArticles->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    } 

}else{
    $errorMsg = "Aucun utilisateur trouvé";
}