<?php
session_start();
if(isset($_POST['submit_connexion'])){
		$mail=htmlentities(trim($_POST['mail']));
		$mdp=htmlentities(trim($_POST['mdp']));
		if($mail&&$mdp){
			$connect=mysqli_connect('localhost','root','',"gestion_impresion") or die('Error');
			mysqli_select_db($connect,'gestion_impresion');
			$requete="SELECT count(*) FROM users where mail = '".$mail."' and mdp = '".$mdp."' ";
			$exec_requete = mysqli_query($connect,$requete);
			$reponse=mysqli_fetch_array($exec_requete);
        	$count=$reponse['count(*)'];
        	if($count!=0){ // nom d'utilisateur et mot de passe correctes
        		$requete2="SELECT id_user FROM users where mail = '".$mail."' and mdp = '".$mdp."' ";
        		$exec_requete2 = mysqli_query($connect,$requete2);
				$reponse2=mysqli_fetch_array($exec_requete2);
        		$id_user=$reponse2['id_user'];
           		$_SESSION['id_user'] = $id_user;
           		header('Location: checkout.php');
        	}
        	else{
           		die("mot de passe ou email incorrect"); // utilisateur ou mot de passe incorrect
        	}
			mysqli_close($connect);
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Mon compte</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">    
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<!--<link href="themes/css/bootstrappage.css" rel="stylesheet"/>-->
		
		<!-- global styles -->
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	


	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="compte.php">Mon compte</a></li>
							<li><a href="cart.php">panier</a></li>
							<li><a href="register_connexion.php">Connexion</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./Acceuil.html">Acceuil</a></li>								
							<li><a href="./etudiant.html">Espace etudiant</a></li>				
							<li><a href="./professeur.html">Espace professeur</a></li>
							<li><a href="./contact.php">Contact</a></li>	
						</ul>
					</nav>
				</div>
			</section>
 
<section class="header_text sub">
    
	<img class="pageBanner" src="themes/images/image1.png" alt="New products" >
    <div class="searchArticle">
        <h4><span>Mon compte</span></h4>
        <div class="formArticle">





                </div>

                		<h5 align="left">Merci d’avoir commander sur Click To Print,<br/>

Click To Print apporte à ses clients confort, prix compétitifs, et toutes les dernières nouveautés avec pour objectif de devenir la destination pour tous vos besoins. <br/>

Bienvenue sur notre page de statut de commande. Entrez votre adresse e-mail et mot de passe pour connaître l'état de votre commande..</h5>
    <div id="absoluteCenteredDiv">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Connexion</strong> </span></h4>
						<form action="#" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">adresse e-mail</label>
									<div class="controls">
										<input type="text" placeholder="Entrer votre adresse e-mail" id="email" name="mail" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Mot de passe</label>
									<div class="controls">
										<input type="password" placeholder="Entrer votre mot de passe" id="password" name="mdp" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" name='submit_connexion' class="btn btn-inverse large" type="submit" value="Connectez-vous à votre compte">
									<hr>
									<p class="reset"><a tabindex="4" href="#" title="Informations de compte oubliées ?">Mot de passe oubliées ?</a></p>
								</div>
							</fieldset>
						</form>				
					</div>                                   
 </div>
</section>									
     <div>
         <section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./Acceuil.html">Acceuil</a></li>  
							<li><a href="./etudiant.html">Espace etudiant</a></li>
							<li><a href="./professeur.html">Espace professeur</a></li>
							<li><a href="./contact.php">Contactez-nous</a></li>							
						</ul>					
					</div>
					<div class="span3">
						<h4>Compte</h4>
						<ul class="nav">
							<li><a href="./compte.php">Mon compte</a></li>  
							<li><a href="./cart.php">Mon panier</a></li>  
							<li><a href="./register_connexion.php">Connexion ou inscription</a></li>
						</ul>					
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p style="color:#FFFFFF"> Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
					</div>					
				</div>	
</section>
     </div>

</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>