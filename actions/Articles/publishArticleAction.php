<?php

require('actions/database.php');

//Valider le formulaire
if (isset($_POST['validate'])) {

    //Vérifier si les champs ne sont pas vide 
    if (!empty($_POST['title']) and !empty($_POST['description'])) {

        //Les données de l'article
        $article_title = htmlspecialchars($_POST['title']);
        $article_description = nl2br(htmlspecialchars($_POST['description']));
        $article_date = date('d/m/Y');
        $article_id_author = $_SESSION['id'];
        $article_pseudo_author = $_SESSION['pseudo'];

        //Insérer l'article sur le site
        $insertArticlesOnWebsite = $bdd->prepare('INSERT INTO articles(titre, description, id_auteur, pseudo_auteur, date_publication)VALUES(?, ?, ?, ?, ?)');
        $insertArticlesOnWebsite->execute(
            array(
                $article_title,
                $article_description,
                $article_id_author,
                $article_pseudo_author,
                $article_date
            )
        );

        $successMsg = "Votre article a bien été publié !";
    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
