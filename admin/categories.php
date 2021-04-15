<?php
session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com')  // Vérification session admin
{
  /*********** Récupération des catégories ************/

  $connexion = getConnexion();

  $sql = $connexion->prepare('SELECT id, title
                       FROM categories');

  $sql->execute();

  $categories = $sql->fetchAll();

  if(isset($_GET['id']) && !empty($_GET['id']))
  {
    /************ Suppression d'une catégorie ************/

    $id = $_GET['id'];

    $sql = $connexion->prepare('DELETE FROM categories WHERE id = ?');

    $sql->execute([$id]);

    redirect('categories.php');
  };

  if(isset($_POST) && !empty($_POST))
  {
    /************** Création d'une catégorie ************/

    $sql = $connexion->prepare('INSERT INTO categories (title)
                                VALUES(?)');
    $sql->execute([
        $_POST['title']
      ]);

    redirect('categories.php');
  };

  require ('categories.phtml');

} else {              // Redirection si la session admin n'est pas définie
  redirect('../connexion/login.php');
};
