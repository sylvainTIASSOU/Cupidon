<?php
    //session_start();
    //require('connexion_a_la_base.php');

    // affichage de derniere message des utilisateur
    $re = $bdd->prepare('SELECT * FROM messagerie WHERE id = ? and idS = ? or id = ? and idS = ? ORDER BY idM DESC LIMIT 0,1');
            $re->execute(array($_SESSION['id'], $id_utilisateur, $id_utilisateur, $_SESSION['id']));
    while($donne=$re->fetch())
    {
        if($donne['id']==$_SESSION['id'])
        {
            echo '
            <div class="msgSortant">
                <p> vous: '.$donne['message'].'*'.$donne['dates'].'</p>
            </div>
        ';

        }
        else
        {
            echo '
                <div class="msgEntrant">
                    <p> <strong>'.$donne['message'].'</strong>'.'*'.$donne['dates'].'</p>
                </div>
            ';
        }
    }
    