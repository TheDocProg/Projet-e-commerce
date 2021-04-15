<?php

session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com')  //Vérification session admin
{
  $connexion = getConnexion();

  if(isset($_POST) && !empty($_POST))
  {
    // Géstion des lots non spécifiés
    if($_POST['lots'] == 0 || empty($_POST['lots']) || $_POST['lots'] == 1)
    {
      $_POST['lots'] = null;
    };
    $id = $_POST['id'];

    /******************* Modification de l'article ***************/

    if(isset($_FILES['picture']['tmp_name']) && !empty($_FILES['picture']['tmp_name']))
    {
      /********* Traitement de l'image ********/
      // Chemin du fichier
      $imgDirectory = '../img/articles/';

      // Nom du fichier et extension
      $type = explode('/', $_FILES['picture']['type']);
      $extension = $type[1];
      $validExtensions = [
          'jpg',
          'jpeg',
          'png'
        ];

      if (in_array($extension, $validExtensions)) {
        $fileName = uniqid() . '.' . $extension;
      } else {
        // Gestion de l'erreur du fichier
        redirect('editForm.php?id='.$_POST['id']);
      };

      // Enregistrement du fichier
      move_uploaded_file($_FILES['picture']['tmp_name'], $imgDirectory. $fileName);

      $img = 'img/articles/'.$fileName;
      /******** fin de traitement de l'image ***********/

      /*********** Modification de l'article si la photo à été changée *********/

      $sql = $connexion->prepare('UPDATE articles
                                  SET title = ?, picture = ?, alt = ?, price = ?, lots = ?, description = ?, more_about = ?
                                  WHERE id = ?');

      $sql->execute([
        $_POST['title'],
        $img,
        $_POST['alt'],
        $_POST['price'],
        $_POST['lots'],
        $_POST['description'],
        $_POST['more_about'],
        $id
      ]);

    } else {

      /*********** Modification de l'article si la photo n'a pas été changée *********/

      $sql = $connexion->prepare('UPDATE articles
                                  SET title = ?, alt = ?, price = ?, lots = ?, description = ?, more_about = ?
                                  WHERE id = ?');

      $sql->execute([
        $_POST['title'],
        $_POST['alt'],
        $_POST['price'],
        $_POST['lots'],
        $_POST['description'],
        $_POST['more_about'],
          $id
      ]);
    };

    redirect('admin-index.php');

  } else {

    /**************** Récupération de l'article à modifier *************/

    $sql = $connexion->prepare('SELECT id, title, picture, alt, price, lots, description, more_about
                                FROM articles
                                WHERE id = ?');

    $sql->execute([$_GET['id']]);

    $article = $sql->fetch();

    require 'editForm.phtml';
  };

} else {             // Redirection si la session admin n'est pas définie
  redirect('../connexion/login.php');
};
