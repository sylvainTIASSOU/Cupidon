<?php
    //on demmare la session
    session_start();

    require('../modeles/connexion_a_la_base.php');

//on recupère les donnee de la formulaire
    $password = htmlspecialchars($_POST['password']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    

    if(!empty($password) && !empty($pseudo))
    {
        
        //on verifi si le nom et le mot de passe entré sont bien la base de donné
        $password = sha1($password);
        $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND passwords = ?');
        $req->execute(array($pseudo, $password));
        $resulta = $req->fetch();

        if($resulta)
        {
             //on vas stocker les donneé de celui qui s'iscrit dans des sessions
            //pour pouvoir les utilisés dans les page suivant
            $_SESSION['id'] = $resulta['id'];
            $_SESSION['sexe'] = $resulta['sexe'];
            //echo $_SESSION['sexe'];

            //on redirige la personne vers son compte
            echo 'success';
            //header('Location:../vue/page/compte.php');
        }
        else
        {
            echo 'le pseudo ou le mot de passe est incorrecte';
            //header('Location:../vue/page/Connexion.php?erreur=2');
        }
    }
    else
    {
        echo 'Tous les champs sont obligatoir';
        //header('Location:../vue/page/Connexion.php?erreur=1');
    }