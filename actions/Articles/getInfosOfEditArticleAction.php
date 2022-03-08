<?php

require('actions/database.php');

//Vérifier si l'id de l'article est bienpassé en parametre dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfArticle = $_GET['id'];

    //vérifier si l'article existe
    $checkIfArticleExists = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $checkIfArticleExists->execute(array($idOfArticle));

    if ($checkIfArticleExists->rowCount() > 0) {

        //Récuperer les données de la question
        $articleInfos = $checkIfArticleExists->fetch();
        if ($articleInfos['id_auteur'] == $_SESSION['id']) {

            $article_title = $articleInfos['titre'];
            $article_description = $articleInfos['description'];

            $article_description = str_replace('<br />', '', $article_description);
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette article";
        }
    } else {
        $errorMsg = "Aucune question n'a été trouvée";
    }
} else {
    $errorMsg = "Aucune question n'a été trouvée";
}
