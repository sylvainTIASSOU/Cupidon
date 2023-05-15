<?php  
    session_start();
    require('connexion_a_la_base.php');
    if(isset($_GET['nb_message1']))
    {
       $_SESSION['nb_message1']=$_GET['nb_message1'];
       $nb_message=$_SESSION['nb_message1']-2;
    }
    elseif (isset($_GET['nb_message2'])) 
    {
        $nb_message=$_GET['nb_message2']-2;
    }
    elseif(isset($_GET['nb_message3']))
    {
        $nb_message=$_GET['nb_message3']+2;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="profil">
        <?php 
            $requ = $bdd->prepare('SELECT * FROM users WHERE id = ?');
            $requ->execute(array($_SESSION['id_ut']));
            while($don=$requ->fetch())
            
            {
                echo '
                    <div class="prof">
                        <p><a href="compte.php">retour</a></p>
                        <p> <img src="image/'.$don['photo'].'" alt="" heigth=2 width=10> '.$don['pseudo'].' '.$don['nom'].'</p>
                        <p></p>
                    </div>
                ';
            }
        ?>
    </div>
    
    <div class="message">
        <?php 
    
            if($nb_message>2)
            {
                echo '
                <p><a href="afficher_les_ancien_message.php?nb_message2='.$nb_message.'">les anciens messages</a></p>
                ';
                $curseur=$nb_message-2;
                $re = $bdd->prepare('SELECT * FROM messagerie WHERE id = ? and idS = ? or id = ? and idS = ? ORDER BY idM LIMIT '.$curseur.',2');

                $re->execute(array($_SESSION['id'], $_SESSION['id_ut'], $_SESSION['id_ut'], $_SESSION['id']));

                while($donne=$re->fetch())
                {
                    if($donne['id']==$_SESSION['id'])
                    {
                        echo '
                        <div class="msgSortant">
                            <p>'.$donne['message'].'</p>
                            <p>'.$donne['dates'].'</p>
                        </div>
                    ';

                    }
                    else
                    {
                        echo '
                            <div class="msgEntrant">
                                <p style = "color: red">'.$donne['message'].'</p>
                                <p>'.$donne['dates'].'</p>
                            </div>
                        ';
                    }
                        
                }
                if($nb_message==$_SESSION['nb_message1']-2)
                {
                    echo '<p><a href="message.php?id_ut='.$_SESSION['id_ut'].' ">les messages recents</a></p>';  
                }
                else
                {
                    echo '<p><a href="afficher_les_ancien_message.php?nb_message3='.$nb_message.' ">les messages recents</a></p>';  
                }
            }
            else
            {
                $re = $bdd->prepare('SELECT * FROM messagerie WHERE id = ? and idS = ? or id = ? and idS = ? ORDER BY idM LIMIT 0,'.$nb_message);
                $re->execute(array($_SESSION['id'], $_SESSION['id_ut'], $_SESSION['id_ut'], $_SESSION['id']));
                while($donne=$re->fetch())
                {
                    if($donne['id']==$_SESSION['id'])
                    {
                        echo '
                        <div class="msgSortant">
                            <p>'.$donne['message'].'</p>
                            <p>'.$donne['dates'].'</p>
                        </div>
                    ';

                    }
                    else
                    {
                        echo '
                            <div class="msgEntrant">
                                <p style = "color: red">'.$donne['message'].'</p>
                                <p>'.$donne['dates'].'</p>
                            </div>
                        ';
                    }
                        
                }
                if($nb_message==$_SESSION['nb_message1']-2)
                {
                    echo '<p><a href="message.php?id_ut='.$_SESSION['id_ut'].' ">les messages recents</a></p>';  
                }
                else
                {
                    echo '<p><a href="afficher_les_ancien_message.php?nb_message3='.$nb_message.' ">les messages recents</a></p>';  
                }
            }
        ?>
        <!-- formulaire d'envoi des message -->
    </div>
    <div class="form_message">
        <form action="messageAction.php" method="POST">
            <textarea name="message" id="" cols="20" rows="1"></textarea>
            <button>ENVOYER</button>
        </form>
    </div>
</body>
</html>