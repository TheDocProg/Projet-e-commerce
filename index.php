<?php
session_start();

require 'utilities/connexion.php';
require 'utilities/utilities.php';


if (isset($_GET['cookie']) && !empty($_GET['cookie']))
{
  $_SESSION['cookie'] = $_GET['cookie'];
};

/********* récupération des articles **********/

$connexion = getConnexion();

$sql = $connexion->prepare('SELECT id, title, picture, price, lots, alt, category_id
                            FROM articles');

$sql->execute();

$articles = $sql->fetchAll();

/*********** récupération des catégories ***********/

$connexion = getConnexion();

$sql = $connexion->prepare('SELECT id, title
                            FROM categories');

$sql->execute();

$categories = $sql->fetchAll();

$template = 'home';
require 'layout.phtml';
