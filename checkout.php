<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

$dsn='mysql:hosy=localhost;dbname=gestion_impresion';
$username='root';
$password='';
$con=new PDO($dsn,$username,$password);
$name=$_POST["nom"];
$prenom=$_POST["prenom"];
$mail=$_POST["mail"];
$tel=$_POST["tel"];
$mdp=$_POST["mdp"];
$id_user=$_SESSION['id_user'] ?: null;
$stml=$con->prepare('SELECT * FROM users where id_user='.$id_user." ");
$stml->execute();
$resultat = $stml->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['submit'])){
	if(!empty($name)){
		$stml1=$con->prepare("UPDATE users SET Nom= '$name' WHERE id_user = '$id_user'");
		$stml1->execute();
	}
	if(!empty($prenom)){
		$stml1=$con->prepare("UPDATE users SET Prenom= '$prenom' WHERE id_user = '$id_user'");
		$stml1->execute();
	}
	if(!empty($mail)){
		$stml1=$con->prepare("UPDATE users SET mail= '$mail' WHERE id_user = '$id_user'");
		$stml1->execute();
	}
	if(!empty($tel)){
		$stml1=$con->prepare("UPDATE users SET tel= '$tel' WHERE id_user = '$id_user'");
		$stml1->execute();
	}
	if(!empty($mdp)){
		$stml1=$con->prepare("UPDATE users SET mdp= '$mdp' WHERE id_user = '$id_user'");
		$stml1->execute();
	}
}
if(isset($_POST['submit_compte'])){
	
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Mon compte</title>
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
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
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
					<a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
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
				<h4><span>Mon compte</span></h4>
			</section>	
			    	<form method="POST" action="" >
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Suivez l'avancement de votre commande</a>
								</div>
								<div id="collapseOne" class="accordion-body in collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="span6">
												<?php
													$stml=$con->prepare("select * from commande,cours where cours.name=commande.name and commande.tele='$resultat[tel]'");
													$stml->execute();
													$cours=$stml->fetchAll();

													//foreach ($cours as $cour) :
													//	echo $cour['name'];
													//	echo $cour['nbr_page'];

												//	endforeach 
												?>
												
<table class="table table-striped">
							<thead>
								<tr>
									<th>Supprimer</th>
									<th>Image</th>
									<th>Nom du produit</th>
									<th>Quantite</th>
									<th>Prix d'unite</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cours as $article) : ?>
								<tr>
									<td><input type="checkbox" value="option1"></td>
									<td><a href="product_detail.html"><img alt="" src="themes/images/ladies/<?php echo $article['id_d'].'.jpg';?>"></a></td>
									<td><?php echo $article['name']; ?></td>
									<td><input type="text" placeholder="1" value=<?php echo $article['qte']; ?> class="input-mini"></td>
									<td><?php echo number_format($article['prix'],2,',',' '); ?></td>
									<td><?php echo number_format($article['prix']*$article['qte'],2,',',' '); ?></td>
								</tr>		
								<?php endforeach; ?>	  
	  
							</tbody>
						</table>

						<hr/>
						<p class="buttons center">				
							<button class="btn btn-inverse" type="submit_compte" id="checkout">Valide</button>
						</p>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Compte &amp; informations personnels</a>
								</div>
								<div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="span6">
												<h4>votre informations personnels</h4>
												<div class="control-group">
													<label class="control-label">Nom</label>
													<div class="controls">
														<input disabled="disabled" type="text" placeholder="" class="input-xlarge" value=<?php echo $resultat['Nom']; ?>>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Prenom</label>
													<div class="controls">
														<input type="text" disabled="disabled" placeholder="" class="input-xlarge" value=<?php echo $resultat['Prenom']; ?>>
													</div>
												</div>					  
												<div class="control-group">
													<label class="control-label">Adresse e-mail</label>
													<div class="controls">
														<input type="text" disabled="disabled" placeholder="" class="input-xlarge" value=<?php echo $resultat['mail']; ?>>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Telephone</label>
													<div class="controls">
														<input type="text" disabled="disabled" placeholder="" value=<?php echo $resultat['tel']; ?> class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Mot de passe</label>
													<div class="controls">
														<input type="text" placeholder="" value=<?php echo $resultat['mdp']; ?> disabled="disabled" class="input-xlarge">
													</div>
												</div>
											</div>
											<div class="span6">
												<h4>Effectuer des modifications</h4>
												<div class="control-group">
													<label class="control-label">Modifier votre nom</label>
													<div class="controls">
														<input type="text" name="nom" placeholder="" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Modifier votre prenom</label>
													<div class="controls">
														<input type="text" name="prenom" placeholder="" class="input-xlarge">
													</div>
												</div>					  
												<div class="control-group">
													<label class="control-label">Modifier votre adresse e-mail</label>
													<div class="controls">
														<input type="text" name="mail" placeholder="" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Modifier votre telephone</label>
													<div class="controls">
														<input type="text" name="tel" placeholder="" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Modifier votre mot de passe</label>
													<div class="controls">
														<input type="password" name="mdp" placeholder="" class="input-xlarge">
													</div>
												</div>
												<p class="buttons center">				
													<button class="btn btn-inverse" name="submit" type="submit" id="checkout">Modifier</button>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>				
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
					<div class="span4">
						<h4>Compte</h4>
						<ul class="nav">
							<li><a href="./compte.php">Mon compte</a></li>  
							<li><a href="./cart.php">Mon panier</a></li>  
							<li><a href="register_connexion.php">Connexion ou inscription</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p> Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
					</div>					
				</div>	
			</section>
>
		</div>
		<script src="themes/js/common.js"></script>
	</form>
    </body>
</html>