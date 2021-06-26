<?php
session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com')  // Vérification session admin
{
  /*********** Récupération des articles ************/

  $connexion = getConnexion();
  $sql = $connexion->prepare('SELECT id, title, picture, alt, stock
                              FROM articles');

  $sql->execute();

  $articles = $sql->fetchAll();

  $j = 0;   // Variable pour différencier les id

  require 'stock.phtml';

  /************** Modification le stock ************/

  if(isset($_POST) && !empty($_POST))
  {
    $id = $_POST['id'];
    $stock = $_POST['stock'];

    $sql = $connexion->prepare('UPDATE articles
                                SET stock = ?
                                WHERE id = ?');

    $sql->execute([
      $stock,
      $id
    ]);
  };

} else {              // Redirection si la session admin n'est pas définie
  redirect('../connexion/login.php');
};
