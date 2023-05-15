<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="../js/inscription3.js" async></script>
    <link rel="stylesheet" href="../css/inscription3.css">
</head>
<body>

    <!-- on inclut le menu -->
    <?php 
        
        require('menu.php');
    ?>
<br>
    <div class="formulaire">
<!-- affichages des message d'erreu -->
        <div class="erreur">
            <p id="errorMessage"></p>
        </div>

 <!-- formulaire d'inscription -->
        <form id="form">
            

    <!-- champs de la saisi du mot de passe -->
            <input class="texte" type="password" name="password1" placeholder="mot de passe"><br><br>
            <input class="texte" type="password" name="password2" placeholder="confimer votre mot de passe"><br><br>
    <!-- bouton de soumition -->
            <input class="texte" type="submit" value="S'INSCRIRE" class="submit">   
        </form>
    </div>
    <?php require('footer.php'); ?>
</body>
</html>