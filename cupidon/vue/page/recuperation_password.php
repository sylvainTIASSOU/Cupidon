<?php
    session_start();
    require('connexion_a_la_base.php');
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
    <?php 
        echo '
        <p>recuperation du mot de passe de l utilisateur d identifiant
         '.$_GET['id'].'
        </p>
        ';
    ?>
</body>
</html>