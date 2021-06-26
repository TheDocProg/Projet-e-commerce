<?php

session_start();

require '../utilities/utilities.php';
require '../utilities/connexion.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == "admin@mail.com")  // Vérification de la session admin
{
  /***************** Création du nouvel article ****************/

  if (isset($_POST) && !empty($_POST)) {

    // Chemin du fichier
    $imgDirectory = '../img/articles/';

    if (empty($_FILES['picture']['tmp_name'])) {
        // Aucun fichier n'a été envoyé
        redirect('new.php');
      } else {
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
            redirect('new.php');
          }
        }

        // Enregistrement du fichier
        move_uploaded_file($_FILES['picture']['tmp_name'], $imgDirectory. $fileName);

        $img = 'img/articles/'.$fileName;
        /******** fin de traitement de l'image ***********/

        // Vérification des champs renseignés
        if ($_POST['title'] == -1 ||
        $_POST['description'] == -1 ||
        $_POST['price'] == -1 ||
        $_POST['more_about'] == -1 ||
        $_POST['alt'] == -1) {

          redirect('new.php');
        }

        /************* gerer les lots si non indiqué ************/
        if($_POST['lots'] == 0 || empty($_POST['lots']) || $_POST['lots'] == 1)
        {
          $_POST['lots'] = null;
        };

        /********** Créer le nouvel article dans la base de données ***********/
        $connexion = getConnexion();

        $sql = $connexion->prepare('INSERT INTO articles (title, description, price, lots, picture, alt, more_about, category_id, stock, created_at)
                                    VALUES(?,?,?,?,?,?,?,?,?,NOW())');
        $sql->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $_POST['lots'],
            $img,
            $_POST['alt'],
            $_POST['more_about'],
            $_POST['category'],
            $_POST['stock']
          ]);

          redirect('admin-index.php');
        } else {

          /*********** récupération des catégories ***********/

          $connexion = getConnexion();

          $sql = $connexion->prepare('SELECT id, title
                                FROM categories');

          $sql->execute();

          $categories = $sql->fetchAll();

          require 'new.phtml';

        };
} else {            // Redirection si la seesion admin n'est pas définie
  redirect('../connexion/login.php');
};
