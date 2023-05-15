<?php
    // page de la connexion a la base de donné

    try
    {
        // je vais utilisé PDO pour la connexion et les requetes
        $bdd = new PDO('mysql:host=localhost;dbname=Application_de_rencontre', 'root', '');
       // echo 'connexion reussi';
    }
    catch(Exception $e)
    {
        die('erreur:'. $e->getmessage());
    }