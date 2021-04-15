<?php

session_start();

require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com') // Vérification session admin
{
  require 'admin-index.phtml';
} else {
  redirect('../connexion/login.php');
};
