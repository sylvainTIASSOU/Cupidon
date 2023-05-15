<?php

    session_start();

    $password1 = htmlspecialchars($_POST['password1']);
    $password2= htmlspecialchars($_POST['password2']);

    if(!empty($password1) && !empty($password2))
    {
        if($password1 == $password2)
        {   //$password1 = sha1($password1);
            $_SESSION['password1'] = $password1;
            $_SESSION['password2'] = $password2;
            //header('Location:inscriptionAction11.php');
            echo'success';
        }
        else
        {
            echo'les mots de passes ne sont pas conforment!!';
        }
    }
    else
    {
        echo'tous les champs sont obligatoire';
    }