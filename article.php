<?php
session_start();
setcookie('cart');

require 'utilities/connexion.php';
require 'utilities/utilities.php';

/*********** Récuperation de l'article séléctionné **********/

if (isset($_GET) && !empty($_GET))
{
  $connexion = getConnexion();

  $sql = $connexion->prepare('SELECT id, title, picture, description, more_about, price, lots, alt, stock
                              FROM articles
                              WHERE id = ?');

  $sql->execute([
    $_GET['id']
  ]);

  $article = $sql->fetch();


  // Compter le stock pour proposer
  // les quantitées.
  $stock = [];

  for($i = 1; $i <= $article['stock']; $i++)
  {
    array_push($stock, $i);
  };

  $template = 'article';
  require 'layout.phtml';
};

/************ ajout au panier *************/

if (isset($_POST) && !empty($_POST))
{
  $item = $_POST['id']. 'x' . $_POST['quantity'];
  $submitted = $_POST['id'].'x';

  /***** Ajout à la session *****/

  if (isset($_SESSION['cart']) && !empty($_SESSION['cart']))
  {
    $k = 0;

    // Vérification que l'article ajouté ne soit pas
    // déjà dans la session, sinon modifier la quantité.
    foreach($_SESSION['cart'] as $verify)
    {
      $new = explode('x', $verify);

      if(strpos($new[0], $submitted) !== false)
      {
        $newQuantity = $new[1] + $_POST['quantity'];
        $matching = $k;
      } else {
        $k++;
      };
    };

    if(isset($matching))  // L'article existe déjà
    {
      $_SESSION['cart'][$matching] = $new[0]. 'x' .$newQuantity;
    } else {
      array_push($_SESSION['cart'], $item);
    };
    unset($matching);

  } else {
      $_SESSION['cart'] = [$item];
  };

  if ($_SESSION['cookie'] == "yes")
  {
    /***** Ajout au cookie *****/

    if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart']))
    {
      $cookie = explode('/', $_COOKIE['cart']);
      $k = 0;

      // Vérification que l'article ajouté ne soit pas
      // déjà dans le cookie, sinon modifier la quantité.
      foreach($cookie as $verify)
      {
        if(strpos($verify, $submitted) !== false)
        {
          $new = explode('x', $verify);
          $newQuantity = $new[1] + $_POST['quantity'];
          $matching = $k;
        } else {
          $k++;
        };
      };

      if(isset($matching))  // L'article existe déjà
      {
        $cookie[$matching] = $new[1] + $_POST['quantity'];
        $cart = implode('/', $cookie);
      } else {
        $cart = $item. '/' .$_COOKIE['cart'];
      };

      setcookie('cart', $cart, time() + 15*24*3600);
    } else {
      setcookie('cart', $item, time() + 15*24*3600);
    };
  };
};
