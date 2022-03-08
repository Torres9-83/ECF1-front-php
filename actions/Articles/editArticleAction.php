<?php

require('actions/database.php');

//Validation du formulaire 
if (isset($_POST['validate'])) {

    //verifier si les champs sont remplis
    if (!empty($_POST['title']) and !empty($_POST['description'])) {

        //les données & faire passer dans la requête 
        $new_article_title = htmlspecialchars($_POST['title']);
        $new_article_description = nl2br(htmlspecialchars($_POST['description']));

        //modifier les informations de la question qui possede l'id rentré en parametre
        $editArticleOnWebsite = $bdd->prepare('UPDATE articles SET titre = ?, description = ? WHERE id =?');
        $editArticleOnWebsite->execute(array($new_article_title, $new_article_description, $idOfArticle));

        header('Location: myArticles.php');
    }
} else {
    $errorMsg = "Veuillez compléter tous les champs ...";
}
