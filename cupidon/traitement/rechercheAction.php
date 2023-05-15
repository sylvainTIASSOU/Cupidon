<?php 
    session_start();
    require('../modeles/connexion_a_la_base.php');

    $pseudo = htmlspecialchars($_POST['pseudo']) ;
    

    if(!empty($pseudo))
    {
        $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $resulta = $req->fetch();

        if($resulta)
        {
            //on redirige la personne vers son compte
            $_SESSION['pseudo'] = $pseudo;
            header('Location:../vue/page/recherche_compte.php');
        }
        else
        {
            header('Location:../vue/page/compte.php?erreur=1');
        }
    }
    else
    {
        header('Location:../vue/page/compte.php?erreur=2');
    }