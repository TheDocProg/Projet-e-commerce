<?php

session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com') // Vérification session admin
{
/*************** Récupération des articles ***************/

  $connexion = getConnexion();
  $sql = $connexion->prepare('SELECT id, title, picture, alt
                              FROM articles');

  $sql->execute();

  $articles = $sql->fetchAll();

  require 'edit.phtml';

} else {       // Redirection si la session admin non définie
  redirect('../connexion/login.php');
};
