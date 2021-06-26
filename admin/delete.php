<?php

session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com')  // Vérification session admin
{
  /************** Supprimer un article **************/

  if(isset($_GET['id']) && !empty($_GET['id']))
  {
    $id = $_GET['id'];

    $connexion = getConnexion();
    $sql = $connexion->prepare('DELETE FROM articles WHERE id = ?');

    $sql->execute([$id]);

    redirect('delete.php');

  } else {

    /************* Récuperation de tout les articles **************/

    $connexion = getConnexion();
    $sql = $connexion->prepare('SELECT id, title, picture, alt, price, lots
                                FROM articles');

    $sql->execute();

    $articles = $sql->fetchAll();

    require 'delete.phtml';
  };
} else {     // Redirection si la session admin non définie
  redirect('../connexion/login.php');
};
