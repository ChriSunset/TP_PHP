<?php
$pdo = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_prenom', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,

    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
$erreur = '';
$content = '';
