<?php
    
    session_start();
    require('../modeles/connexion_a_la_base.php');
    //le R devant les variable signifi recupéré
    $nomR = $_SESSION['nom'];
    $pseudoR = $_SESSION['pseudo'];
    $paysR = $_SESSION['pays'];
    $ageR = $_SESSION['annee'];
    $descripR = $_SESSION['description'];
    $photoR = $_SESSION['profil'];
    $sexeR = $_SESSION['sexe'];
    $sexe1R = $_SESSION['sexe1'];
    $passwordR = $_SESSION['password1'];
    //$ = $_SESSION[''];

    //on enrregistre les donné dans la base de donné
    $passwordR = sha1($_SESSION['password1']);
    $requete = $bdd->prepare('INSERT INTO users(nom, pseudo, sexe, sexe1, pays, descrip, passwords, photo, age) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $requete->execute(array($nomR, $pseudoR, $sexeR, $sexe1R, $paysR,$descripR, $passwordR, $photoR, $ageR));

    
    header('Location:../vue/page/Connexion.php');
   // echo 'success';

    //echo $descripR;