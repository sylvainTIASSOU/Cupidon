<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="../js/inscription1.js" async></script>
    <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>

    <!-- on inclut le menu -->
        <?php 
            
            require('menu.php');
        ?>
        <br>
 <!-- on inclut le menu
    <div id="chargement">
        <p>chargement...</p>
    </div> -->
<section id="body">

    

    
<br>
    <div class="formulaire">
<!-- affichages des message d'erreu -->
        <div class="erreur">
            <p id="errorMessage"></p>
        </div>

 <!-- formulaire d'inscription -->
        <form id="form">
            <input class="texte" type="text" name="nom" placeholder="Votre Nom"><br><br>
            <input class="texte" type="text" name="pseudo" placeholder="Votre Pseudo"><br><br>
            <input class="texte" type="text" name="pays" placeholder=" votre Pays de residence "><br><br>
<!-- champs de la selection du sexe -->
            <div class="sexe">
                <label for="">Votre Sexe</label>
                <input type="radio" name="sexe"  value="homme">
                <label for="">Homme</label>
                <input type="radio" name="sexe" value="femme">
                <label for="">Femme</label><br>
            </div><br>

        
            <div class="sexe">
                <label for="">choisi le genre de sexe que vous desirez rencontrez</label> <br>
                <input type="radio" name="sexe1" value="homme">
                <label for="">Homme</label>
                <input type="radio" name="sexe1" value="femme">
                <label for="">Femme</label><br>
            </div><br>
    <!-- bouton de soumition -->
            <input class="texte" type="submit" value="CONTINUEZ" class="submit">   
        </form>
        <p>Avez-vous déjà un compte?<a href="Connexion.php">Connectez-vous</a></p>
    </div>
</section>
<?php require('footer.php'); ?>
</body>
</html>