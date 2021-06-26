<?php
session_start();
setcookie('cart');

require '../utilities/connexion.php';
require '../utilities/utilities.php';

if (empty($_POST)) {

  if (isset($_GET['error']) && !empty($_GET['error']))
  {
    switch ($_GET['error']) {
        case 1:
          $error = 'Aucun compte lié à cet e-mail';
          break;
        case 2:
          $error = 'Mot de passe invalide';
          break;
        case 3:
          $error = 'Vous devez vous connecter ou créer un compte pour passer une commande';
          break;
    };
  };

  if (isset($_COOKIE['remember']) && !empty($_COOKIE['remember']))
  {
    $email = $_COOKIE['remember'];
  } else {
    $email = null;
  };

  require 'login.phtml';

} else {

  $db = getConnexion();
  $sql = $db->prepare('SELECT id, email, password
                       FROM users
                       WHERE email = ?');

  $sql->execute([
                $_POST['email']
              ]);

  $user = $sql->fetch();

  if (empty($user)) {

    redirect('login.php?error=1');

  } else {

      if (password_verify($_POST['password'], $user['password'])) {

          $_SESSION['auth'] = [
                  'id' => $user['id'],
                  'email' => $user['email']
              ];

          if($_POST['email'] == 'admin@mail.com')
          {
              redirect('../admin/admin-index.php');
          } else {

            if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == true)
            {
              setcookie('remember', $user['email'], time() + 20*24*3600);
            };

            if (isset($_COOKIE['cart']))
            {
              $cart = explode('/', $_COOKIE['cart']);

              if (isset($_SESSION['cart']))
              {
                $k = 0;

                foreach($_SESSION['cart'] as $article) {

                  $verify = explode('x', $article);

                  foreach($cart as $cookieArticle) {

                    $cookieVerify = explode('x', $cookieArticle);

                    if($verify[0] == $cookieVerify[0])
                    {
                      $new = $verify[0]. 'x' .($verify[1] + $cookieVerify[1]);
                      $_SESSION['cart'][$k] = $new;
                    };
                  };
                  $k++;
                };

                if(!isset($new) || empty($new))
                {
                  $_SESSION['cart'] = array_merge($_SESSION['cart'], $cart);
                }
              } else {
                $_SESSION['cart'] = $cart;
              };

            } else {

              if ($_SESSION['cookie'] == "yes")
              {
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart']))
                {
                  $cart = implode('/', $_SESSION['cart']);

                  setcookie('cart', $cart, time() + 15*24*3600);
                } else {
                  $_SESSION['cart'] = [];
                };
              };
          };

          redirect('../index.php');
        };
        } else {
          redirect('login.php?error=2');
        }
    }
};
