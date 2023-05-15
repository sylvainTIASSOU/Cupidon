<?php
    // enregistrement des message dans la base de donnee
    session_start();
    require('../modeles/connexion_a_la_base.php');

    $msg = htmlspecialchars($_POST['message']);

    $req = $bdd->prepare('INSERT INTO messagerie(id, idS, message, dates)
                        VALUES(?, ?, ?, now())');
    $req->execute(array($_SESSION['id'], $_SESSION['id_con'], $msg));
//apres l'enregistrement on redirigige la personne vers la page de messagerie
    // header('Location:../vue/page/message.php?id_ut='.$_SESSION['id_ut'].''); 


     //affichage des messages

     $req3 = $bdd->prepare('SELECT * FROM  messagerie where id = ? and idS = ? or id = ? and idS = ?');
                $req3->execute(array($_SESSION['id'],$_SESSION['id_con'],$_SESSION['id_con'],$_SESSION['id']));
                while($donneM = $req3->fetch())
                {
                    if($donneM['id'] == $_SESSION['id'])
                    {
                        $message = $donneM['message'];
                    }
                    else
                    {
                       $message = $donneM['message'];
                    }
                }
                echo $message;
               