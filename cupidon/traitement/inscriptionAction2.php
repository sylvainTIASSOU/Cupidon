<?php

    sleep(3);
    session_start();

    
    $annee = htmlspecialchars($_POST['age']);
    $descrip = htmlspecialchars($_POST['description']);

    if(!empty($annee) && !empty($descrip))
    {
        if(!empty($_FILES['photo']['name']))
        {
            $profil = $_FILES['photo']['name'];
            $profilSize = $_FILES['photo']['size'];
            $profilInfo = pathinfo($profil);
            $profilExtension = $profilInfo['extension'];
            $extension = array('png', 'jpeg', 'jpg', 'gif');
            //on verifi si le fichier envoyer est bien une image
            if($profilSize<=5000000)
            {
                        
                if(in_array($profilExtension, $extension))
                {
    
                    if(move_uploaded_file($_FILES['photo']['tmp_name'], "image/".$_FILES['photo']['name']))
                    {
                         //on stocke les donnés dans des sessions
                        $_SESSION['annee'] = $annee;
                        $_SESSION['description'] = $descrip;
                        $_SESSION['profil'] = $profil;        
                        //on redirige l'utilisateur sur la page d'inscription suivant                
                        echo 'success'; 
                    }
                    else
                    {
                        echo 'erreur du chargement du profile';
                    }
                            
                }
                else
                {
                    echo 'le fichier doit etre une photo';
                }
            }
            else
            {
                echo 'le profils doit etre inferieur a 5MO';
            }
        }
        else
        {
            echo 'Tous les champs sont obligatoir';
        }
    }
    else
    {
        echo 'Tous les champs sont obligatoir';
    }
