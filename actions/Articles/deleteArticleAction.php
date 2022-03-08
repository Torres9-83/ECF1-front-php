<?php

// verifier si l'user est auth au niveau du site
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

//verifier si l'id est rentré en parametre dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //l'id de l'article en parametre
    $idOfArticle = $_GET['id'];


    //verifier si l'article existe
    $checkIfArticleExists = $bdd->prepare('SELECT id_auteur FROM articles WHERE id = ?');
    $checkIfArticleExists->execute(array($idOfArticle));

    if ($checkIfArticleExists->rowCount() > 0) {

        //recuperer les infos de l'article
        $articleInfos = $checkIfArticleExists->fetch();
        if ($articleInfos['id_auteur'] == $_SESSION['id']) {

            //supprimer l'article en fonction de son id rentré en parametre
            $deleteThisArticle = $bdd->prepare('DELETE FROM articles WHERE id = ?');
            $deleteThisArticle->execute(array($idOfArticle));

            header('Location: ../../myArticles.php');
        } else {
            echo "Vous n'avez pas le droit de supprimer une question qui ne vouss appartient pas !";
        }
    } else {
        echo "Aucun article n'a été trouvée";
    }
} else {
    echo "Aucun article n'a été trouvé";
}
