<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Connexion</title>
		<script src="../js/connexion.js" async></script>
		<link rel="stylesheet" href="../css/connexion.css">
	</head>
	<body>

		<!-- on inclut le menu -->
		<?php require('menu.php'); ?>
		<br><br>
		<!-- J'a utilisé post ici comme méthode et non get -->	
		<div>
			<h3>connectez vous a votre compte pour chater!!!!!!</h3>
		</div>
		<br><br>
       <div class="formulaire">
			<div class="erreur" >
			
                 <p id="errorMessage"></p> 
					
			</div>
			<br>
			<form id="form"> <!-- La page de traitement, je l'ai nommé traitement.php
				et c'est cette page qui s'en chargera du traitement des données envoyer par notre formulaire de connexion-->

					<div>
						<input class="texte" type="text" name="pseudo" placeholder="Entrez votre pseudo" /><br/><br>
						<input class="texte" type="password" name="password" placeholder="Votre mot de passe"><br><br>
					</div>
					<input class="texte" type="submit" value="Se connecter"/>
				<!-- Comme c'est une application web, je n'ai plus mis des label, parceque cela prendra un peu d'esopace
				à l'écran de l'utlisateur. Au lieu et place des label, j'ai utilisé placeholder pour indiquer ce que l'utilisateur doit 
				écrire dans chaque case -->
			</form>
			<p>vous n'avez pas encors un compte? <a href="inscription1.php">inscrivez-vous</a></p>
			<?php 
				// echo '
				// 	<p><a href="recuperation_password.php?id='.$_SESSION['id'].'">vous avez oublier votre mot de passe ?</a></p>
				// ';
			?> 
			
			
			</div>

			<?php require('footer.php'); ?>
	   

	</body>

</html>
