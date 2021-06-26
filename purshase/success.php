<?php
session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

// Préparation des infos
$infos = json_decode($_SESSION['order_info'], true);
$adress = $infos['adress']. ' ' .$infos['postal_code']. ' ' .$infos['city'];

$cart = json_decode($_SESSION['order'], true);
$articles = [];

foreach ($cart as $article)
{
  $item = $article['id']. 'x' .$article['quantity'];
  array_push($articles, $item);
};

$articles = implode('/', $articles);

/**** Création de la commande dans la base de données ****/

$connexion = getConnexion();

if(isset($_SESSION['auth']) && !empty($_SESSION['auth']))
{
  $sql = $connexion->prepare('INSERT INTO orders (user_id, first_name, last_name, email, adress, articles, ordered_at)
                              VALUES(?,?,?,?,?,?,NOW())');

  $sql->execute([
      $_SESSION['auth']['id'],
      $infos['first_name'],
      $infos['last_name'],
      $infos['email'],
      $adress,
      $articles
    ]);

} else {

  $sql = $connexion->prepare('INSERT INTO orders (first_name, last_name, email, adress, articles, ordered_at)
                              VALUES(?,?,?,?,?,NOW())');

  $sql->execute([
      $infos['first_name'],
      $infos['last_name'],
      $infos['email'],
      $adress,
      $articles
    ]);
};

/******** Retirer l'article/les articles du stock ********/

foreach($cart as $article)
{
  $stock = $article['stock'] - $article['quantity'];

  $sql = $connexion->prepare('UPDATE articles
                              SET stock = ?
                              WHERE id = ?');

  $sql->execute([
    $stock,
    $article['id']
  ]);
};

/*** Envoi d'un mail pour prevenir l'administrateur ***/

$date = date('d/m/Y \à H\hi');

$to = 'itunecompte2@gmail.com';
$subject = 'Nouvelle commande';
$message = 'Une nouvelle commande à été passée le '. $date;

mail($to, $subject, $message);

/**** Suppression de la commande de $_SESSION et du panier *****/

unset($_SESSION['order']);
unset($_SESSION['cart']);

require 'success.phtml';
