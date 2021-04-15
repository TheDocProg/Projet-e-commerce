<?php

function getConnexion(): PDO
{
    return new PDO(
        'mysql:host=localhost:3306;dbname=cotonnade_co;charset=UTF8',
        'root',
        '', [
            // On active les erreurs lors des requêtes
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // On récupère les résultats dans un tableau associatif uniquement
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
}
