<?php
	if(isset($_POST['submit_inscription'])){
	$nom=htmlentities(trim($_POST['nom']));
	$prenom=htmlentities(trim($_POST['prenom']));
	$mail=htmlentities(trim($_POST['mail']));
	$tel=htmlentities(trim($_POST['tel']));
	$mdp=htmlentities(trim($_POST['mdp']));
	if($nom&&$prenom&&$mail&&$tel&&$mdp){
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $mail)){
		    die("The email you have entered is invalid, please try again.");
		}
		else{
			$connect=mysqli_connect('localhost','root','',"gestion_impresion") or die('Error');
			mysqli_select_db($connect,'gestion_impresion');
			if($_POST['genre']=='etudiant'){
				$query=mysqli_query($connect,"INSERT INTO users VALUES(0,'$prenom','$nom','$mail','$tel','$mdp','etudiant')");
			}
			else{
				$query=mysqli_query($connect,"INSERT INTO users VALUES(0,'$prenom','$nom','$mail','$tel','$mdp','professeur')");
			}
				mysqli_close($connect);
				Header('Aceuil.html');
		}
	}
}
	if(isset($_POST['submit_connexion'])){
		$mail=htmlentities(trim($_POST['mail']));
		$mdp=htmlentities(trim($_POST['mdp']));
		if($mail&&$mdp){
			$connect=mysqli_connect('localhost','root','',"gestion_impresion") or die('Error');
			mysqli_select_db($connect,'gestion_impresion');
        	$requete2="SELECT mail FROM users where categorie = 'admin'";
        	$exec_requete2 = mysqli_query($connect,$requete2);
			$reponse2=mysqli_fetch_array($exec_requete2);
        	$mail_admin=$reponse2['mail'];
        	$requete3="SELECT mdp FROM users where categorie = 'admin'";
        	$exec_requete3 = mysqli_query($connect,$requete3);
			$reponse3=mysqli_fetch_array($exec_requete3);
        	$mdp_admin=$reponse3['mdp'];
			if($mail==$mail_admin&&$mdp==$mdp_admin){
           		header('Location: admin.php');
        	}
        	else{
				$dsn='mysql:hosy=localhost;dbname=gestion_impresion';
				$username='root';
				$password='';
				$con=new PDO($dsn,$username,$password);
				$stml=$con->prepare("SELECT count(*) FROM users where mail = '".$mail."' and mdp = '".$mdp."' ");
				$stml->execute();
				$resultat = $stml->fetch(PDO::FETCH_ASSOC);
        		$count=$resultat['count(*)'];
        		if($count!=0){ // nom d'utilisateur et mot de passe correctes
           			//$_SESSION['username'] = $username;
           			header('Location: Acceuil.html');
        		}
        		else{
           			die("mot de passe ou email incorrect"); // utilisateur ou mot de passe incorrect
           		}
        	}
			mysqli_close($connect);
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
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
				<h4><span>Connexion ou inscription</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
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
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Inscription</strong></span></h4>
					<form action="#" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Nom :</label>
									<div class="controls">
										<input type="text" name="nom" placeholder="Entrer votre nom" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prenom :</label>
									<div class="controls">
										<input type="text" name="prenom" placeholder="Entrer votre prenom" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Adresse e-mail :</label>
									<div class="controls">
										<input type="text" name="mail" placeholder="Entrer votre adresse e-mail" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Telephone :</label>
									<div class="controls">
										<input type="text" name='tel' placeholder="Entrer votre numero de telephone" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Mot de passe:</label>
									<div class="controls">
										<input type="password" name='mdp' placeholder="Entrer votre mot de passe" class="input-xlarge">
									</div>
								</div>	
								<input type="radio" name="genre" value="etudiant" id="etudiant" checked="checked" />
                     			<label for="etudiant" class="inline">Etudiant</label>
                     			<input type="radio" name="genre" value="profeseur" id="professeur" />
                     			<label for="professeur" class="inline">Professeur</label>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Creer votre compte" name="submit_inscription"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			
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
							<li><a href="register_connexion.php">Connexion ou inscription</a></li>
						</ul>					
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p style="color:#FFFFFF">Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
					</div>					
				</div>	
			</section>

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