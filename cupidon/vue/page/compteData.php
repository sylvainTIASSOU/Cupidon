<?php
    session_start();
    require("../../modeles/connexion_a_la_base.php");

    $req2 = $bdd->prepare("SELECT * from users where id != ? and sexe != ?");
            $req2->execute(array($_SESSION['id'], $_SESSION['sexe']));
            while($donne1 = $req2->fetch())
            {
                //je stock l'id de l'utilisateur conncete
            $_SESSION['id_con'] = $donne1['id'];
                echo '
                
                <div class="users">
                <ul>
                    <li>
                        <div class="user_profil">
                        <img src="../../traitement/image/'.$donne1['photo'].'" alt="">
                        </div>
                    </li>
                    <li class="info">'.$donne1['pseudo'].'</li>
                    <li class="info">'.$donne1['nom'].'</li>
                    <li class="info">'.$donne1['age'].'</li>
                    <li class="info">'.$donne1['pays'].'</li>
                
        
                </ul>
                <br>
                <p>'.$donne1['descrip'].'</p>
            </div>
                
                ';
            }

?>