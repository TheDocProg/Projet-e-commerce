<?php
setcookie('cart');
session_start();

if (isset($_POST) && !empty($_POST))
{
  $update = [];

  foreach($articles as $article) {
    if($article['id'] == $_POST['id']) {
      $article['quantity'] = $_POST['quantity'];
    }
    $new = $article['id']. 'x' .$article['quantity'];
    array_push($update, $new);
  };
  $_SESSION['cart'] = $update;

  $cookie = implode('/', $update);
  setcookie('cart', $cookie, time() + 15*24*3600);
};
