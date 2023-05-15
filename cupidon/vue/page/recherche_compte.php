<?php 
    session_start();
    require('connexion_a_la_base.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
            
        require('menu.php');
    ?>
    <h1>compte</h1>
    <!-- affichage des information concernant la personne -->
    <div class="profil">
        <ul>
            <?php
                $requete = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                $requete->execute(array($_SESSION['id']));
                while($donne = $requete->fetch())
                {
                    echo '
                    <li class="image"><img src="../../traitement/image/'.$donne['photo'].'" alt="" heigth=50 width=50 ></li>
                    <li class="nom">'.$donne['pseudo'].' '.$donne['nom'].'</li>
                    ';
                }
            ?>
        </ul>
    </div>
    <div class="recherche">
        <form action="POST" action="recherche.php">
            <input type="text" name="recherche" placeholder="recherche par pseudo">
            <button>recherchez</button>
        </form>
    </div>

    <!-- on affiche les personne de sexe desiree -->

    <div class="utilisateurs">
        <?php 
            $requete = $bdd->prepare('SELECT id, nom, pseudo, descrip, photo, year(now())-annee as anne FROM users WHERE id != ? AND sexe != ? and pseudo = ?');
            $requete->execute(array($_SESSION['id'], $_SESSION['sexe'], $_SESSION['pseudo']));
            while($donne = $requete->fetch())
            {
                $_SESSION['id_ut'] = $donne['id'];
                echo '
                        <div class="user">
                            <div class="entete">
                                <ul> 
                                    <li><img src="../../traitement/image/'.$donne['photo'].'" alt="" heigth=9 width=50/></li>
                                    <li>'.$donne['anne'].' ans '.$donne['pseudo'].' '.$donne['nom'].'</li>
                                </ul>
                            </div>
                            <p><img src="../../traitement/image/'.$donne['photo'].'" heigth=5 width=200/></p>
                            <p>'.$donne['descrip'].'</p>
                            <p><a href="message.php?id_ut='.$_SESSION['id_ut'].'">message</a></p>
                        </div>
                ';
            }
        // affichage de derniere message des utilisateur
            $re = $bdd->prepare('SELECT * FROM messagerie WHERE id = ? ORDER BY idM DESC LIMIT 0,1');
            $re->execute(array($_SESSION['id']));
            while($donne=$re->fetch())
            {
                echo '
                    <div class="msg1">
                        <p><b>VOUS</b><br/> '.$donne['message'].'</p>
                        <p>'.$donne['dates'].'</p>
                    </div>
                ';
            }
            
            $req = $bdd->prepare('SELECT * FROM messagerie WHERE id = ?  ORDER BY idM DESC LIMIT 0,1');
            $req->execute(array($_SESSION['id_ut']));
            while($donnee=$req->fetch())
            
            {
                echo '
                    <div class="msg2">
                        <p>'.$donnee['message'].'</p>
                        <p>'.$donnee['dates'].'</p>
                    </div>
                ';
            }
        ?>
    </div>
    
</body>
</html>