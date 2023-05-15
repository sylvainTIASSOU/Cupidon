<?php 
session_start();
require("../../modeles/connexion_a_la_base.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/compte.css">
    <script src="../js/compteData.js" async></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>


    <header>
			

			<div class="nav">
				<nav class="menu">
					<ul>
                        <li>
                            <div class="logo" id="logo">
				                <img src="../image/logo.png" alt="">
			                </div>
                        </li>
						<li class="li"><a  href="../../index.php">Acceuil</a></li>
						<li class="li"><a href="inscription1.php">Inscription</a></li>
						<li class="li"><a href="Connexion.php">Connexion</a></li>
						<li class="li"><a href="#">Déconnexion</a></li>
                        <li class="li"><a href="conversation.php"><i class="bi bi-chat-fill"></i></a></li>
                       
					</ul>
				</nav>
			</div>
	</header>



    <!-- profile -->

    <?php 

        $req1 = $bdd->prepare('SELECT * from users where id = ? ');
        $req1->execute(array($_SESSION['id']));
        while($donne=$req1->fetch())
        {
            echo '
            
            <div class="profiles">
            <ul>
               
                <li>
                    <div class="profile" class="pp">
                        <img src="../../traitement/image/'.$donne['photo'].'" alt="">
                    </div>
                </li>
                <li class="lip">'.$donne['pseudo'].'</li>
                <li class="lip">'.$donne['nom'].'</li>
                <li class="lik" class="b"><a href="#">INFORMATION PERSONNEL</a></li>
                <li class="lik"><a href="#">Actualité</a></li>
            </ul>
        </div>
            
            ';
        }
    ?>
   
    <!-- users-->
   

    <?php 
       $req2 = $bdd->prepare("SELECT * from users where id != ? and sexe != ?");
       $req2->execute(array($_SESSION['id'], $_SESSION['sexe']));
       while($donne1 = $req2->fetch())
       {
           //je stock l'id de l'utilisateur conncete
       $_SESSION['id_con'] = $donne1['id'];
           echo '

           <section id="section">

           </section>
           
               <a href="message.php?id_con='.$_SESSION['id_con'].'">Message</a>
       
           
           ';
       }
    ?>
   
    
    <?php require('footer.php'); ?>
</body>
</html>