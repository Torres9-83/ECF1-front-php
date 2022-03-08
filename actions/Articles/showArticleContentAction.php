<?php

require('actions/database.php');

//verifier si l'id de l'article est rentré dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //recuperer l'id de l'article 
    $idOfTheArticle = $_GET['id'];

    //verifier si l'article existe
    $checkIfArticleExists = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $checkIfArticleExists->execute(array($idOfTheArticle));

    if ($checkIfArticleExists->rowCount() > 0) {

        //recuperer toutes les datas de l'article
        $articleInfos = $checkIfArticleExists->fetch();

        //stocker les datas de l'article dans des variables 
        $article_title = $articleInfos['titre'];
        $article_description = $articleInfos['description'];
        $article_id_author = $articleInfos['id_auteur'];
        $article_pseudo_author = $articleInfos['pseudo_auteur'];
        $article_publication_date = $articleInfos['date_publication'];
    } else {
        $errorMsg = "Aucun article n'a été trouvée";
    }
} else {
    $errorMsg = "Aucun article n'a été trouvée";
}
