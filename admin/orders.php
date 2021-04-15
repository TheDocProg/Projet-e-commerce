<?php
session_start();

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']['email'] == 'admin@mail.com')  // Vérification session admin
{
  $connexion = getConnexion();

  if(isset($_GET['id']) && !empty($_GET['id']))
  {
    /************* Afficher la commande sélectionnée ***********/

    $sql = $connexion->prepare('SELECT id, first_name, last_name, adress, articles, email, ordered_at
                                FROM orders
                                WHERE id = ?');

    $sql->execute([$_GET['id']]);

    $order = $sql->fetch();

    // Récupération des id et quantités des articles de la commande
    $articles = explode('/', $order['articles']);
    $list = [];
    $cart = [];

    foreach($articles as $article)
    {
      $item = explode('x', $article);
      $item['id'] = $item[0];
      $item['quantity'] = $item[1];

      array_push($list, $item);
    };

    // Récupération des articles dans la base de données
    foreach($list as $article)
    {
      $sql = $connexion->prepare('SELECT id, title, picture, alt, price, lots
                                  FROM articles
                                  WHERE id = ?');

      $sql->execute([$article['id']]);

      $item = $sql->fetch();

      $item['quantity'] = $article['quantity'];

      array_push($cart, $item);
    };


    require 'order.phtml';

  } elseif(isset($_POST) && !empty($_POST)) {
    /************ Suppression de la commande ****************/

    $id = $_POST['id'];

    $sql = $connexion->prepare('DELETE FROM orders WHERE id = ?');

    $sql->execute([$id]);

    redirect('admin-index.php');
  } else {

    /************** Afficher la liste des commandes **************/

    $sql = $connexion->prepare('SELECT id, ordered_at, email
                                FROM orders
                                ORDER BY ordered_at DESC');

    $sql->execute();

    $orders = $sql->fetchAll();

    require 'orders.phtml';
  };

} else {          // Redirection si la session admin n'est pas définie
  redirect('../connexion/login.php');
};
