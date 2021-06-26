<?php
session_start();

require 'utilities/connexion.php';
require 'utilities/utilities.php';


/*************** Ajout de commentaires ************/

$connexion = getConnexion();

$sql = $connexion->prepare('INSERT INTO comments (title, content, article_id, user_id, created_at)
                            VALUES (?,?,?,?,NOW())');

$sql->execute([
  $_POST['title'],
  $_POST['content'],
  $_POST['art_id'],
  $_SESSION['auth']['id']
]);
