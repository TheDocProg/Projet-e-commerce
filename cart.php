<?php
setcookie('cart');
session_start();
require 'utilities/connexion.php';
require 'utilities/utilities.php';

/********* récupération des articles dans le panier **********/
$cart = [];
$articles = [];
if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
  {
    foreach ($_SESSION['cart'] as $data) {
      array_push($cart, explode('x', $data));
    };

    foreach($cart as $article_id)
    {
      $connexion = getConnexion();

      $sql = $connexion->prepare('SELECT id, title, price, lots, picture, alt, stock
                                  FROM articles
                                  WHERE id = ?');

      $sql->execute([$article_id[0]]);

      $article = $sql->fetch();

      // Déterminer la quantité
      if(isset($article_id[1]) && !empty($article_id[1]))
      {
        $article['quantity'] = $article_id[1];
      } else {
        $article['quantity'] = 1;
      };

      $article['total'] = $article['price'] * $article['quantity'];

      array_push($articles, $article);

    };
    $j = 0;

};

/********* Supprimer un article du panier *********/

if(isset($_GET['id']) && !empty($_GET['id']))
{
  $i = 0;

  foreach($articles as $article)
  {
    if($article['id'] == $_GET['id'])
    {
      $key = $i;
      $i++;
    } else {
      $i++;
    };
  };
  array_splice($articles, $key, 1);
  array_splice($_SESSION['cart'], $key, 1);

  // Remplacer le cookie 'cart' par le panier modifié
  $cookie = implode('/', $_SESSION['cart']);
  setcookie('cart', $cookie, time() + 15*24*3600);
};

/*********** Passer la commande ************/

if(isset($_POST) && !empty($_POST))
{
  if(isset($_SESSION['auth']) && !empty($_SESSION['auth']))
  {
    $_SESSION['order'] = json_encode($articles);

    redirect('purshase/ordering.php');
  } else {
    redirect('connexion/login.php?error=3');
  };
};

$template = 'cart';
require 'layout.phtml';
