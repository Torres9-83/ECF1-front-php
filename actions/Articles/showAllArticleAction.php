<?php

require('actions/database.php');

//recuperer les articles par defaut sans recherche 
$getAllArticles = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM articles ORDER BY id DESC LIMIT 10');

//verifier si une recherche a ete rentré par l'user
if (isset($_GET['search']) and !empty($_GET['search'])) {

    //la recherche
    $usersSearch = $_GET['search'];

    //recuperer tous les articles qui crorrespondent a la recherche (en fonction du titre et description)
    $getAllArticles = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM articles WHERE titre LIKE "%' . $usersSearch . '%" ORDER BY id DESC');
}
