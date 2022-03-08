<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=ecf1_afpa;charset=utf8;', 'root', '0000');
} catch (Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
