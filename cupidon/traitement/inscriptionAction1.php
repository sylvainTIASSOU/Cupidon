<?php

    //sleep(3);

    session_start();
    require('../modeles/connexion_a_la_base.php');

    $nom = htmlspecialchars($_POST['nom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
   $sexe =htmlspecialchars($_POST['sexe']);
   $sexe1 = htmlspecialchars($_POST['sexe1']);
    $pays = htmlspecialchars($_POST['pays']);
    //$sexe = $_POST['sexe'];

    //on vérifi si les champs sont bien remplis
    if(!empty($nom) && !empty($pseudo) && !empty($sexe) && !empty($sexe1) && !empty($pays))
    {
        //on vérrifit si l'utilisateur n'est pas un homo
        if($sexe != $sexe1)
        {
            // on vérifie si le pseudo n'est pas encore dans la base

            //$password1 = sha1($password1); //la fonction sha1 permet de hacher les mot de passes dans la basse de donné
            //on verifi si le nom et le mot de passe entré sont bien la base de donné
            $requet = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $requet->execute(array($pseudo));
            $resultat = $requet->fetch();

            if(!$resultat)
            {
                //on vas stocker tous les donnee du formulaire dans des session pour
                //pouvoir les enregistrés dans la base plus tard
                $_SESSION['nom'] = $nom;
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['sexe'] = $sexe;
                $_SESSION['sexe1'] = $sexe1;
                $_SESSION['pays'] = $pays;
                
                //on redirige l'utilisateur sue la page d'inscription suivant
                //header('Location:../vue/page/inscription2.php');
                echo 'success';
            }
            else
            {
                echo 'le pseudo existe déjà';
                //header('Location:../vue/page/inscription1.php?erreur=3');
            }
        }
        else
        {
            echo 'les homo ne sont pas requisent';
            //header('Location:../vue/page/inscription1.php?erreur=2');
        }
    }
    else
    {
        echo 'Tous les champs sont obligatoir';
        //header('Location:../vue/page/inscription1.php?erreur=1');
    }