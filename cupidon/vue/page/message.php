<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/message.css">
    <script src="../js/message.js" async></script>
    <title>Document</title>
</head>
<body>

<div class="conteneur_message">
    <?php session_start();
            require("../../modeles/connexion_a_la_base.php");
        $req2 = $bdd->prepare("SELECT * from users where id =?");
        $req2->execute(array($_GET['id_con']));
        while($donne1 = $req2->fetch())
        {
            echo '

            <div class="profil">
            <ul>
                <li><a href="compte.php">retour</a></li>
                <li>
                    <div class="photo">
                        <img src="../../traitement/image/'.$donne1['photo'].'" height="50" width="50" alt="">
                    </div>
                </li>
                <li>'.$donne1['pseudo'].'</li>
            </ul>
        </div>
            
            ';
        }
    

    ?>
    
    
    
        <section  id="message">

                
        <div class="message">

        <?php
                        $req3 = $bdd->prepare('SELECT * FROM  messagerie where id = ? and idS = ? or id = ? and idS = ?');
                        $req3->execute(array($_SESSION['id'],$_SESSION['id_con'],$_SESSION['id_con'],$_SESSION['id']));
                        while($donneM = $req3->fetch())
                        {
                            if($donneM['id'] == $_SESSION['id'])
                            {
                               ?>
                                <div class="message_envoyer" id="message_envoyer">
                                    <p id="envoie">ffffffffffffffffffffffffffffffffffffffff</p>
                                </div>
                                
                                <?php
                            }
                            else
                            {
                                 ?>
                                <div class="message_recu" id="message_recu">
                                    <p id="envoie">zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz</p>
                                </div>
                                <?php
                            }
                        }
                ?>
            
        </div>

        </section>
        
        <div class="formulaire" >
            <form id="form">
                <textarea name="message" id="" cols="20" rows="1"></textarea>
                <button>Envoyer</button>
            </form>
        </div>
    </div>
</body>
</html>