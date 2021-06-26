<?php

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if (isset($_POST) && !empty($_POST)) {

    /********** vérifier si l'email existe déja ************/
    $connexion = getConnexion();

    $sql = $connexion->prepare('SELECT email
                                FROM users
                                WHERE email = ?');

    $sql->execute([
        $_POST['email']
    ]);

    $user = $sql->fetch();


    if(empty($user))
    {
      if($_POST['password'] == $_POST['confirm_password'])
      {
        $adress = $_POST['adress']. ' ' .$_POST['postal_code']. ' ' .$_POST['city'];

        /************* Créer un nouveau user **************/

        $adress = $_POST['adress']. '/' .$_POST['postal_code']. '/' .$_POST['city'];

        $sql = $connexion->prepare('INSERT INTO users (email, password, first_name, last_name, adress, created_at)
                                    VALUES(?,?,?,?,?,NOW())');

        $sql->execute([
          $_POST['email'],
          password_hash($_POST['password'], PASSWORD_BCRYPT),
          $_POST['first_name'],
          $_POST['last_name'],
          $adress
        ]);

        redirect('../index.php');
      } else {
        redirect('register.php');
      };
    } else {
        redirect('register.php');
    };
};

require 'register.phtml';
