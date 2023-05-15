<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="../js/inscription2.js" async></script>
    <link rel="stylesheet" href="../css/inscription2.css">
</head>
<body>
    <?php 
        
        require('menu.php');
    ?>

    <div id="chargement">
        <p>chargement</p>
    </div>

    <section id="body">
    <!-- on inclut le menu -->
    
<br>
<div class="formulaire">
<!-- affichages des message d'erreu -->
        <div class="erreur">
            <p id="errorMessage"></p>
        </div>

 <!-- formulaire d'inscription -->
        <form id="form" enctype="multipart/form-data">

        
        <br>
            <!-- champs de la saisi de la date de naissance -->
            <div class="date_de_naissance">
                <input class="texte" type="number" name="age" placeholder="votre Age">
            </div><br>

     <!-- champs du choix de la photo de profil-->
            <label for="">choisisez un profile</label>
            <input class="texte" id="file" type="file" name="photo"/> <br><br>
    <!-- champs de la description da personne-->
            <label for="">Petit description de votre personnalité</label><br><br>
            <textarea class="texte" name="description" id="" cols="30" rows="3"></textarea> <br> <br>

    <!-- bouton de soumition -->
            <input class="texte" type="submit" value="CONTINUEZ">   
        </form>
    </div>
    </section>
    <?php require('footer.php'); ?>
</body>
</html>