<?php
require('actions/database.php');

$getAllMyArticles = $bdd->prepare('SELECT id, titre, description FROM articles WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyArticles->execute(array($_SESSION['id']));
