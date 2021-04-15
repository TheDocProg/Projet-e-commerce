<?php
session_start();

require '../utilities/utilities.php';
require '../utilities/connexion.php';

if(isset($_SESSION['order']) && !empty($_SESSION['order']))
{
  $articles = json_decode($_SESSION['order'], true);
  $total = 0;

  $db = getConnexion();
  $sql = $db->prepare('SELECT id, email, first_name, last_name, adress
                       FROM users
                       WHERE id = ?');

  $sql->execute([
                $_SESSION['auth']['id']
              ]);

  $user = $sql->fetch();

  $adressLines = explode(' ', $user['adress']);

  $adress = $adressLines[0];
  $postalCode = $adressLines[1];
  $city = $adressLines[2];

  foreach ($articles as $article) {
    $total += $article['total'];
  };


  if(isset($_POST) && !empty($_POST))
  {
    $_SESSION['order_info'] = json_encode($_POST);

    redirect('payment.php');

  };

  require 'ordering.phtml';

} else {
  redirect('../cart.php');
};
