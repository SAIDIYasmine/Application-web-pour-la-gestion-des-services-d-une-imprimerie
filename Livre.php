<?php 
	$dsn='mysql:hosy=localhost;dbname=gestion_impresion';
	$username='root';
	$password='';
	$con=new PDO($dsn,$username,$password);
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			.button {
  				background-image: linear-gradient(to right, #E44D26 0%, #F16529 51%, #E44D26 100%);
  				border: none;
  				color: white;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
  				margin: 4px 2px;
  				cursor: pointer;
			}
			.button1 {padding: 5px 10px;}
		</style>
		<meta charset="utf-8">
		<title>Livre</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">    
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		
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
        			<h4><span>Rechercher Cours ou Thése</span></h4>
        			<div class="formArticle">
        				<form action="" method="post" >
                			<fieldset>
                 				<legend> A propos du document : </legend>
                  				<label for="fichier">Nom du document :</label>
                   				<input type="" name="nomDocument" size="20" maxlength="40"  id="fichier" /> 
                			</fieldset>
                    		<p>
                    		<input type="submit" value="chercher" class="button button1" name="button1"  />
                    		<input type="reset" value="Annuler" class="button button1" name="annuler" onclick="location.href='Livrerecherche.php'"/>
                    		</p>
        				</form>
                	</div>
                <div class="span6">

				<?php 
					if(isset($_POST['button1'])){
						$rechercheQuoi=$_POST['nomDocument'];
						$stml=$con->prepare("select * from cours where name like '%$rechercheQuoi%' ");
					}
					else{
						$stml=$con->prepare('SELECT * FROM cours');
					}
					$stml->execute();
					$cours=$stml->fetchAll();

					foreach ($cours as $cour) : ?>

					<div class="product-box">
						<span class="sale_tag"></span>						
						<a href="product_detail.php?id=<?php echo $cour['id_d'];?>"><img alt="" src="themes/images/ladies/<?php echo $cour['image'].'.jpg';?>"></a><br/>
						<a href="product_detail.php?id=<?php echo $cour['id_d'];?> " class="title"><?php echo $cour['name']; ?></a><br/>
						<a href="#" class="category"><?php echo $cour['ecole']; ?></a>
						<p class="price"><?php echo number_format($cour['prix'],2,',',' '); ?></p>
					</div>
					<?php endforeach ?>
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
							<p style="color:#FFFFFF">Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
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